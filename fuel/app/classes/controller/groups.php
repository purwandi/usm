<?php

class Controller_Group extends Controller_Template
{

	public function action_index()
	{
		$this->template->title = 'Groups &raquo; Index';
		$this->template->content = View::forge('groups/index');
	}

	public function action_create()
	{
		$this->template->title = 'Groups &raquo; Create';
		$this->template->content = View::forge('groups/create');
	}

	public function action_update()
	{
		$this->template->title = 'Groups &raquo; Update';
		$this->template->content = View::forge('groups/update');
	}

	public function action_view()
	{
		$this->template->title = 'Groups &raquo; View';
		$this->template->content = View::forge('groups/view');
	}

	public function action_delete()
	{
		$this->template->title = 'Groups &raquo; Delete';
		$this->template->content = View::forge('groups/delete');
	}

}
