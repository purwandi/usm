<?php

class Auth 
{
	/**
	 * Create token
	 * 
	 * @var [type]
	 */
	private static $_token = '12321ugasda@#$#@#s76675';

	
	/**
	 * Save login session
	 * 
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public static function login ($data = array())
	{
		$data = array(
			'username'	=> $data->username,
			'group_id'	=> $data->group_id
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
		$data = \Session::get(static::$_token.$string);
		if ($data)
		{
			return $data;
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