<?php
class Controller_Topic extends Controller_Base {

	public $module = 'Topic';
	
	public function action_index()
	{
		$this->data['topics'] = Model_Topic::find('all');
		parent :: index ();

	}

	public function action_view($id = null)
	{

		$this->data['topic'] = Model_Topic::find($id);
		parent :: view();

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Topic::validate('create');
			
			if ($val->run())
			{
				$topic = Model_Topic::forge(array(
					'name' => Input::post('name'),
					'time_limit' => Input::post('time_limit'),
					'weight_value' => Input::post('weight_value'),
				));

				if ($topic and $topic->save())
				{
					Session::set_flash('success', 'Added topic #'.$topic->id.'.');

					Response::redirect('topic');
				}

				else
				{
					Session::set_flash('wrong', 'Could not save topic.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_error());
			}
		}

		parent :: create();

	}

	public function action_update ($id = null)
	{
		$topic = Model_Topic::find($id);
		$val = Model_Topic::validate('edit');

		if ($val->run())
		{
			$topic->name = Input::post('name');
			$topic->time_limit = Input::post('time_limit');
			$topic->weight_value = Input::post('weight_value');

			if ($topic->save())
			{
				Session::set_flash('success', 'Updated topic #' . $id);

				Response::redirect('topic');
			}

			else
			{
				Session::set_flash('wrong', 'Could not update topic #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$topic->id = $val->validated('id');
				$topic->name = $val->validated('name');
				$topic->time_limit = $val->validated('time_limit');

				Session::set_flash('error', $val->show_error());
			}
			
			$this->data['topic'] = $topic;
		}

		parent :: update();

	}

	public function action_delete($id = null)
	{
		if ($topic = Model_Topic::find($id))
		{
			$topic->delete();

			Session::set_flash('success', 'Deleted topic #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete topic #'.$id);
		}

		Response::redirect('topic');

	}


}