<?php

class Controller_Caba extends Controller_Base
{

	public $module = 'Caba';

	public function action_index()
	{
		parent :: index ();
	}

	public function action_topic ()
	{
		$this->data['topics'] = Model_Education_Topic::find('all', array(
				'related' => array(
					'topic'
				),
				'where' => array(
					array('education_id',Auth::data('education_id'))
				)
			));

		parent :: index ('topic');
	}

	public function action_mulai($topic_id =  null)
	{
		if ($topic_id)
		{
			if (Input::method() == 'POST')
			{
				Model_User_Question::save_question();
				Model_User_Topic::save_user_topic();
				Model_User_Result::save_results();
				Response::redirect('caba/mulai');
			}

			$this->data['topic'] = Model_Topic::find($topic_id,array(
					'related' => array(
						'question' => array(
							'order_by' => array('parent_id' => 'asc')
						)
					),
				));

			$this->data['jawab'] = Model_User_Question::get_jawaban();
			parent :: index ('mulai');
		}
		else
		{

			Response::redirect('caba/topic');
		}
	}

	public function action_hasil()
	{
		$this->data['topics'] = Model_User_Topic::get_topic();
		$this->data['result'] = Model_User_Result::find('first',array(
			'where' => array(array('user_id','=',Auth::data('id')))
		));

		parent :: index ('hasil');
	}


	public function action_logout()
	{
		if (Auth::logout())
		{
			Response::redirect('private');
		}
	}

}