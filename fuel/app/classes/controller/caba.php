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
					array('education_id','1')
				)
			));

		parent :: index ('topic');
	}

	public function action_mulai($topic_id =  null)
	{
		if ($topic_id)
		{
			$this->data['topic'] = Model_Topic::find($topic_id,array(
					'related' => array(
						'question' => array(
							'order_by' => array('parent_id' => 'asc')
						)
					),
				));
			parent :: index ('mulai');
		}
		else
		{

			Response::redirect('caba/topic');
		}
	}

	public function action_logout()
	{
		if (Auth::logout())
		{
			Response::redirect('private');
		}
	}

}