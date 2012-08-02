<?php
/**
 * Ujian Saringan Masuk
 *
 * @package  USM
 * @version  1.0.0
 * @author   Purwandi <pur@purwandi.me>
 * @license  MIT License
 * @link     http://purwandi.me
 */
class Member extends Base {

	public static $table = 'users';

	protected $property = array(
		'username' => 'required|alpha_num|max:30',
		'email' => 'required|email|max:40',
		'password' => 'min:2, max:32',
		'realname' => 'required|max:80',
		'gender' => 'required|in:M,F',
		'birthday' => 'date:Y-m-d',
		'education_id' => 'required|integer',
		'topic_id' => 'required|integer',
		'role_id' => ''
	);

	public static $per_page = '20';

	public function education()
	{
		return $this->belongs_to('Jenjang');
	}

	public function topic()
	{
		return $this->belongs_to('Topik');
	}

	public static function data($role)
	{
		if ($role === 'caba')
		{
			$u = Member::with('education')->where('role_id','=', $role);
		}
		elseif ($role === 'dosen')
		{
			$u = Member::with('topic')->where('role_id','=', $role);
		}
		else
		{
			$u = Member::where('role_id','=', $role);
		}

		return static::page($u, static::$per_page);
	}
}