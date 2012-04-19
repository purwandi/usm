<?php
class Controller_Topic extends Controller_Template 
{

	public function action_index()
	{
		$data['topics'] = Model_Topic::find('all');
		$this->template->title = "Topics";
		$this->template->content = View::forge('topic/index', $data);

	}

	public function action_view($id = null)
	{
		$data['topic'] = Model_Topic::find($id);

		$this->template->title = "Topic";
		$this->template->content = View::forge('topic/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Topic::validate('create');
			
			if ($val->run())
			{
				$topic = Model_Topic::forge(array(
					'id' => Input::post('id'),
					'name' => Input::post('name'),
					'time_limit' => Input::post('time_limit'),
				));

				if ($topic and $topic->save())
				{
					Session::set_flash('success', 'Added topic #'.$topic->id.'.');

					Response::redirect('topic');
				}

				else
				{
					Session::set_flash('error', 'Could not save topic.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Topics";
		$this->template->content = View::forge('topic/create');

	}

	public function action_edit($id = null)
	{
		$topic = Model_Topic::find($id);
		$val = Model_Topic::validate('edit');

		if ($val->run())
		{
			$topic->id = Input::post('id');
			$topic->name = Input::post('name');
			$topic->time_limit = Input::post('time_limit');

			if ($topic->save())
			{
				Session::set_flash('success', 'Updated topic #' . $id);

				Response::redirect('topic');
			}

			else
			{
				Session::set_flash('error', 'Could not update topic #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$topic->id = $val->validated('id');
				$topic->name = $val->validated('name');
				$topic->time_limit = $val->validated('time_limit');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('topic', $topic, false);
		}

		$this->template->title = "Topics";
		$this->template->content = View::forge('topic/edit');

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