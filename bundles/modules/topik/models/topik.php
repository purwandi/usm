<?php

class Topik extends Base {

	public static $table = 'topik';

	protected $property = array(
		'name' => 'required|max:80',
		'given_time' => 'required|integer',
	);

	public function soal()
	{
		return $this->has_many('Soal');
	}

	public function soaldata()
	{
		return $this->has_many('Soal')->order_by(DB::raw('RAND()'),'');
	}

	public static $per_page = '20';

	public static function data()
	{
		$u = DB::table('topik');
		return static::page($u, static::$per_page);
	}

	public static function dropdown()
	{
		$u = DB::table('topik')->get();
		
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