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
		/*
		if (Input::method() == 'POST')
		{
			$val = Validation::forge('login');
			$val->add_field('username','Username','required');
			$val->add_field('password','Password','required');

			if ($val->run())
			{
				$user = Model_User::find('first',array(
					'related' => array(
						'user_group',
						'user_metadata'
					),
					'where' => array(
						array('username',Input::post('username')),
						array('password',md5(Input::post('password').Input::post('username')))
					)
				));

				if ($user)
				{
					if (Auth::login($user))
					{
						Response::redirect('dashboard');
					}
					else
					{
						Session::set_flash('wrong','Something when wrong');
					}
				}
				else
				{
					Session::set_flash('wrong','Username or password is not found');
				}
			}
			else
			{
				Session::set_flash('error',$val->show_error());
			}

		}*/

		parent :: index ();
	}
}