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
class Jenjang extends Base {

	// descripe nama jenjang
	public static $table = 'jenjang';

	protected $property = array(
		'name' => 'required|max:80',
	);

	public static $per_page = '20';

	public static function data()
	{
		$u = DB::table('jenjang');

		return static::page($u, static::$per_page);
	}

	public static function dropdown()
	{
		$u = DB::table('jenjang')->get();
		
		if ($u)
		{
			$arr = array();

			foreach ($u as $key) 
			{
				$arr[$key->id] = $key->name;
			}

			return $arr;
		}
	}
}