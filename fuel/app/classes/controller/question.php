<?php
class Controller_Question extends Controller_Base
{

	public $module = 'Question';

	public function action_index($topic_id = null)
	{
		if ( $topic_id)
		{
			$this->data['topic'] = Model_Topic::find($topic_id,array(
					'related' => array(
						'question' => array(
							'order_by' => array('parent_id' => 'asc')
						)
					),
				));
			parent :: index ();
		}
		else
		{
			Response::redirect('topic/view');
		}
	}

	public function action_view($id = null)
	{
		$this->data['question'] = Model_Question::find('all');

		parent :: view();

	}

	public function action_create($topic_id)
	{
		if (Input::method() === 'POST')
		{
			// cek validation
			
			$val = validation::forge('create');

			$val->add_field ('name','Question','required');
			$val->add_field ('mode','Mode','required');

			$set1 = array(
				'name'=> Input::post('name'),
				'mode'=> Input::post('mode'),
				'topic_id' => $topic_id,
				'created_at' => time()
			);
			$set2 = array();
			
			if (Input::post('mode') == 'parent' or Input::post('mode') == 'individu')
			{
				$val->add_field ('ops_1','Ops #1','required');
				$val->add_field ('ops_2','Ops #2','required');
				$val->add_field ('ops_3','Ops #3','required');
				$val->add_field ('ops_4','Ops #4','required');
				$val->add_field ('ops_5','Ops #5','required');
				$val->add_field ('answer','Answer','required');

				$set2 = array(
					'ops_1' => Input::post('ops_1'),
					'ops_2' => Input::post('ops_2'),
					'ops_3' => Input::post('ops_3'),
					'ops_4' => Input::post('ops_4'),
					'ops_5' => Input::post('ops_5'),
					'parent_id' => Input::post('parent_id',0),
					'answer' => Input::post('answer'),
				);
			}

			if ($val->run())
			{
				// prepare table insert
				$query = DB::insert('questions');
				// prepare to set value
				$query->set($set1 + $set2);

				// eksekusi
				if ($query->execute())
				{
					Response::redirect('question/index/'.$topic_id);
				}
			}
			else
			{
				Session::set_flash('error',$val->show_error());
				Response::redirect('question/create/'.$topic_id.'?mode='.Input::post('mode').'&parent_id='.Input::post('parent_id'));
			}
			
		}
		
		switch (Input::get('mode')) {
			case 'cerita':
				parent :: create('form/cerita');
				break;
			
			default:
				parent :: create('form/individu');
				break;
		}
	}

	public function action_update($topic_id = null, $id = null)
	{
		if (Input::method() === 'POST')
		{
			// cek validation
			
			$val = validation::forge('create');

			$val->add_field ('name','Question','required');
			$val->add_field ('mode','Mode','required');

			$set1 = array(
				'name'=> Input::post('name'),
				'mode'=> Input::post('mode'),
				'topic_id' => $topic_id,
				'created_at' => time()
			);
			
			$set2 = array();

			if (Input::post('mode') == 'parent' or Input::post('mode') == 'individu')
			{
				$val->add_field ('ops_1','Ops #1','required');
				$val->add_field ('ops_2','Ops #2','required');
				$val->add_field ('ops_3','Ops #3','required');
				$val->add_field ('ops_4','Ops #4','required');
				$val->add_field ('ops_5','Ops #5','required');
				$val->add_field ('answer','Answer','required');

				$set2 = array(
					'ops_1' => Input::post('ops_1'),
					'ops_2' => Input::post('ops_2'),
					'ops_3' => Input::post('ops_3'),
					'ops_4' => Input::post('ops_4'),
					'ops_5' => Input::post('ops_5'),
					'parent_id' => Input::post('parent_id',0),
					'answer' => Input::post('answer'),
				);
			}

			if ($val->run())
			{
				// prepare table insert
				$query = DB::update('questions');
				// prepare to set value
				$query->set($set1 + $set2);

				$query->where('id', '=', $id);

				// eksekusi
				if ($query->execute())
				{
					Response::redirect('question/index/'.$topic_id);
				}
			}
			else
			{
				Session::set_flash('error',$val->show_error());
				Response::redirect('question/create/'.$topic_id.'?mode='.Input::post('mode').'&parent_id='.Input::post('parent_id'));
			}
			
		}
		
		$this->data['data'] = Model_Question::find($id);

		if ( $id && isset($this->data['data']))
		{
			switch (Input::get('mode')) {
				case 'cerita':
					parent :: create('form/cerita');
					break;
				
				default:
					parent :: create('form/individu');
					break;
			}
		}
		else
		{
			parent::action_404();
		}
	}

	public function action_delete($topic_id = null, $id = null)
	{
		$query = DB::delete('questions');
		$query->where('parent_id', $id);
		$query->execute();

		if ($question = Model_Question::find($id))
		{
			$question->delete();

			Session::set_flash('success', 'Deleted question #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete question #'.$id);
		}

		Response::redirect('question/index/'.$topic_id);

	}
}