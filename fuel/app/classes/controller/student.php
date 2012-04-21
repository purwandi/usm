<?php

class Controller_Student extends Controller_Template
{

	public function action_index()
	{
		$this->template->title = 'Student &raquo; Index';
		$this->template->content = View::forge('student/index');
	}

	public function action_create()
	{
		$this->template->title = 'Student &raquo; Create';
		$this->template->content = View::forge('student/create');
	}

	public function action_update()
	{
		$this->template->title = 'Student &raquo; Update';
		$this->template->content = View::forge('student/update');
	}

	public function action_view()
	{
		$this->template->title = 'Student &raquo; View';
		$this->template->content = View::forge('student/view');
	}

	public function action_delete()
	{
		$this->template->title = 'Student &raquo; Delete';
		$this->template->content = View::forge('student/delete');
	}

}
