<?php

class Controller_Group extends Controller_Template
{

	public $template = 'template/layouts/default';

	public function action_index()
	{
		$data['groups'] = Model_Group::find('all');
		$this->template->title = 'Groups / Index';
		$this->template->content = View::forge('group/index',$data);
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Group::validate('create');

			if ($val->run())
			{
				$group = Model_Group::forge(array(
					'name' => Input::post('name'),
				));

				if ($group and $group->save())
				{
					Session::set_flash('success', 'Added group #'.$group->id.'.');

					Response::redirect('group');
				}

				else
				{
					Session::set_flash('error', 'Could not save group.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_error());
			}
		}

		$this->template->title = 'Groups / Create';
		$this->template->content = View::forge('group/form');
	}

	public function action_update($id = null)
	{
		$group = Model_Group::find($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Group::validate('edit');

			if ($val->run())
			{
				$group->name = Input::post('name');

				if ($group ->save())
				{
					Session::set_flash('success', 'Updated education #' . $id);
					Response::redirect('group');
				}
				else
				{
					Session::set_flash('error', 'Could not update education #' . $id);
				}
			}
			else
			{
				Session::set_flash('error',$val->show_error());
			}
		}

		$data['data'] = $group;
		$this->template->title = 'Groups / Update';
		$this->template->content = View::forge('group/form',$data);
	}

	public function action_view()
	{
		$this->template->title = 'Groups / View';
		$this->template->content = View::forge('group/view');
	}

	public function action_delete($id)
	{
		if ($group = Model_Group::find($id))
		{
			$group->delete();
			Session::set_flash('success','Delete group #'.$id);
		}
		else
		{
			Session::set_flash('error', 'Could not delete group #' . $id);
		}

		Response::redirect('group');
	}

}
