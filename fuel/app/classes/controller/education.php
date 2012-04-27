<?php
class Controller_Education extends Controller_Template 
{
	
	public $module = 'education';

	public function action_index()
	{
		$this->data['educations'] = Model_Education::find('all');
		$this->template->title = "Educations";
		$this->template->content = View::forge('education/index', $data);

	}

	public function action_view($id = null)
	{
		$data['education'] = Model_Education::find($id);

		$this->template->title = "Education";
		$this->template->content = View::forge('education/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Education::validate('create');
			
			if ($val->run())
			{
				$education = Model_Education::forge(array(
					'name' => Input::post('name'),
				));

				if ($education and $education->save())
				{
					Session::set_flash('success', 'Added education #'.$education->id.'.');

					Response::redirect('education');
				}

				else
				{
					Session::set_flash('error', 'Could not save education.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Educations";
		$this->template->content = View::forge('education/create');

	}

	public function action_edit($id = null)
	{
		$education = Model_Education::find($id);
		$val = Model_Education::validate('edit');

		if ($val->run())
		{
			$education->name = Input::post('name');

			if ($education->save())
			{
				Session::set_flash('success', 'Updated education #' . $id);

				Response::redirect('education');
			}

			else
			{
				Session::set_flash('error', 'Could not update education #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$education->name = $val->validated('name');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('education', $education, false);
		}

		$this->template->title = "Educations";
		$this->template->content = View::forge('education/edit');

	}

	public function action_delete($id = null)
	{
		if ($education = Model_Education::find($id))
		{
			$education->delete();

			Session::set_flash('success', 'Deleted education #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete education #'.$id);
		}

		Response::redirect('education');

	}


}