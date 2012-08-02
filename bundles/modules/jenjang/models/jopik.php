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
class Jopik extends Base {

	public static $table = 'jenjang_topik';

	public static function save_data($id)
	{
		DB::table('jenjang_topik')->where('jenjang_id', '=', $id)->delete();

		$bobot = Input::get('bobot');
		
		foreach (Input::get('topik_id') as $key) 
		{
			DB::table('jenjang_topik')->insert(array(
				'jenjang_id' => $id,
				'bobot' => $bobot[$key],
				'topik_id' => $key,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			));
		}

		return true;
	}

	public function topik()
	{
		return $this->belongs_to('Topik');
	}
}