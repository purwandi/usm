<?php 
class Controller_Private extends Controller_Base 
{
	public $module = 'Private';

	public function before()
	{
		parent :: before();

		// cek is a login
		// Auth::is_secure_redirect();
	}

	public function action_index ()
	{
		parent :: index ();
	}
}