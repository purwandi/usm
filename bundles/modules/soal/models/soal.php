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
class Soal extends Base {

	public static $table = 'soal';

	protected $property = array(
		'name' => 'required',
		'ops_1' => 'required',
		'ops_2' => 'required',
		'ops_3' => 'required',
		'ops_4' => 'required',
		'ops_5' => 'required',
		'jawaban' => 'required|integer',
		// 'parent_id' => 'required|integer',
		'mode' => 'in:cerita,individu,child',
		// 'topik_id' => 'integer',
	);

	public static $per_page = '20';

	public static function data()
	{
		$passing = DB::table('Soal');

		return static::page($passing, static::$per_page);
	}
}