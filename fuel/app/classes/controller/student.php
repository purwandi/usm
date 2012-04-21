<?php

class Controller_Student extends Controller_Template
{
	public $template = 'template/layouts/default';

	public function action_index()
	{
		$this->template->title = 'Student / Index';
		$this->template->content = View::forge('student/index');
	}

	public function action_create()
	{
		$this->template->title = 'Student / Create';
		$this->template->content = View::forge('student/create');
	}

	public function action_update()
	{
		$this->template->title = 'Student / Update';
		$this->template->content = View::forge('student/update');
	}

	public function action_view()
	{
		$this->template->title = 'Student / View';
		$this->template->content = View::forge('student/view');
	}

	public function action_delete()
	{
		$this->template->title = 'Student / Delete';
		$this->template->content = View::forge('student/delete');
	}

}
