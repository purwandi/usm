<?php
class Controller_Education extends Controller_Base
{
	
	public $module = 'Education';

	public function action_index()
	{
		$this->data['educations'] = Model_Education::find('all');
		parent :: index ();

	}

	public function action_view($id = null)
	{
		$this->data['education'] = Model_Education::find($id);
		parent :: view();

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

		parent :: create();
	}

	public function action_update($id = null)
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

		parent :: update();

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