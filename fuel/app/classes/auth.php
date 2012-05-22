<?php

class Auth 
{
	/**
	 * Create token
	 * 
	 * @var [type]
	 */
	private static $_token = 'usmlog';

	
	/**
	 * Save login session
	 * 
	 * @param  object  $data [description]
	 * @return [type]       [description]
	 */
	public static function login ($data)
	{
		$data = array(
			'id'		=> $data->id,
			'username'	=> $data->username,
			'first_name'=> $data->user_metadata->first_name,
			'last_name'	=> $data->user_metadata->last_name,
			'education_id'	=> $data->user_metadata->education_id,
			'group_id'	=> $data->user_group->group_id,

		);

		if (\Session::set(static::$_token, $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Cek is session set ?
	 * @return boolean [description]
	 */
	public static function is_secure()
	{
		if (\Session::get(static::$_token))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Cek session, if not set will be redirect
	 * @return boolean [description]
	 */
	public static function is_secure_redirect ()
	{
		if ( ! static::is_secure())
		{
			\Response::redirect('private/index');
		}
		else
		{
			// \Response::redirect('')
		}
	}
	
	/**
	 * Return data session
	 * @param  [type] $string [description]
	 * @return [type]         [description]
	 */
	public static function data ($string)
	{
		$data = \Session::get(static::$_token);
		
		if ($data)
		{
			return $data[$string];
		}
		else
		{
			return false;
		}
	}

	/**
	 * Destroy session
	 * @return [type] [description]
	 */
	public static function logout ()
	{
		return \Session::destroy();
	}
}