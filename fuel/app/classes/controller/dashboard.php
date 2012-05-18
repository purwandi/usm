<?php
class Controller_Dashboard extends Controller_Base
{

	public $module = 'Dashboard';

	public function before()
	{
		parent :: before();

		// cek is a login
		Auth::is_secure_redirect();
	}

	public function action_index()
	{
		if (Auth::data('group_id') == '1')
		{
			parent :: index ('administrator');
		}
		elseif(Auth::data('group_id') == '2')
		{
			parent :: index ('tata-usaha');
		}
		elseif(Auth::data('group_id') == '3')
		{
			parent :: index ('dosen');
		}
		elseif(Auth::data('group_id') == '4')
		{
			parent :: index ('mahasiswa');
		}
		else
		{
			parent :: action_404();
		}
		
	}

}