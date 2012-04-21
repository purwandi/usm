<?php

class Controller_Group extends Controller_Template
{

	public $template = 'template/layouts/default';

	public function action_index()
	{
		$this->template->title = 'Groups / Index';
		$this->template->content = View::forge('groups/index');
	}

	public function action_create()
	{
		$this->template->title = 'Groups / Create';
		$this->template->content = View::forge('groups/create');
	}

	public function action_update()
	{
		$this->template->title = 'Groups / Update';
		$this->template->content = View::forge('groups/update');
	}

	public function action_view()
	{
		$this->template->title = 'Groups / View';
		$this->template->content = View::forge('groups/view');
	}

	public function action_delete()
	{
		$this->template->title = 'Groups / Delete';
		$this->template->content = View::forge('groups/delete');
	}

}
