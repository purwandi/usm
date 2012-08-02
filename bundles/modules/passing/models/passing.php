<?php

class Passing extends Base {

	public static $table = 'passing';

	protected $property = array(
		'name' => 'required|max:30',
		'top' => 'required|numeric',
		'bottom' => 'required|numeric',
	);

	public static $per_page = '20';

	public static function data()
	{
		$passing = DB::table('passing');

		return static::page($passing, static::$per_page);
	}
}