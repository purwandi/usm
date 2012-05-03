<?php

class Controller_Base extends Controller_Template 
{
	public $data 		= array();
	public $template 	= 'template/layouts/default';
	public $module;

	/**
	 * Run param before controller is execute
	 * 
	 * @return [type] [description]
	 */
	public function before ()
	{
		parent :: before();

		$this->data['module'] = strtolower($this->module);
	}

	/**
	 * Index page
	 * 
	 * @return [type] [description]
	 */
	protected function index ($file = 'index')
	{
		$this->template->title = $this->module.' / Index';
		$this->template->content = View::forge($this->data['module'].'/'.$file, $this->data);
	}

	/**
	 * Create page
	 * 
	 * @return [type] [description]
	 */
	protected function create ($file = 'form')
	{
		$this->template->title = $this->module.' / Create';
		$this->template->content = View::forge($this->data['module'].'/'.$file, $this->data);
	}

	/**
	 * Update page
	 * 
	 * @return [type] [description]
	 */
	protected function update ($file = 'form')
	{
		$this->template->title = $this->module.' / Update';
		$this->template->content = View::forge($this->data['module'].'/'.$file, $this->data);
	}

	/**
	 * View page
	 * 
	 * @return [type] [description]
	 */
	protected function view ($file = 'view')
	{
		$this->template->title = $this->module.' / View';
		$this->template->content = View::forge($this->data['module'].'/'.$file, $this->data);
	}

	/**
	 * Delete page
	 * 
	 * @return [type] [description]
	 */
	protected function delete ()
	{
		$this->template->title = $this->module.' / Delete';
		$this->template->content = View::forge($this->data['module'].'/delete', $this->data);
	}

	protected function action_404 ()
	{
		$this->template->title = '404 Page Missing';
		$this->template->content = View::forge('base/404', $this->data);
		//return Response::forge(ViewModel::forge('welcome/404'), 404);
	}

}