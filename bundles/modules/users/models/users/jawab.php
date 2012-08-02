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
class Users_Jawab extends Base {

	public static $table = 'user_jawab';

	public static function save_data()
	{
		$auth = Auth::user();

		// get data from form submision
		foreach (Input::get('soal_id') as $key) 
		{
			// echo $key;
			
			$soal = DB::table('soal')
					->where('jawaban','=',str_replace('jawaban_', '', Input::get('jawaban_'.$key)))
					->where('id','=',$key)
					->first();

			// insert
			
			// cek if data exist
			$cek = DB::table('user_jawab')
					->where('user_id','=', $auth->id)
					->where('soal_id','=',$key)
					->first();
			
			if ($cek)
			{
				// update
				DB::table('user_jawab')
					->where('user_id', '=', $auth->id)
					->where('soal_id', '=', $key)
					->update(array(
						'hasil' 	=> ( count($soal) > 0) ? 1 : 0 ,
						'jawaban' 	=> str_replace('jawaban_', '', Input::get('jawaban_'.$key)),
						'updated_at'=> date('Y-m-d H:i:s'),
					));
			}
			else
			{
				// insert
				DB::table('user_jawab')
					->insert(array(
						'hasil' 	=> ( count($soal) > 0) ? 1 : 0 ,
						'jawaban' 	=> str_replace('jawaban_', '', Input::get('jawaban_'.$key)),
						'created_at'=> date('Y-m-d H:i:s'),
						'user_id'	=> $auth->id,
						'soal_id' 	=> $key
					));
			}
		}
	}

	public static function group_soal()
	{
		$auth = Auth::user();

		return DB::table('user_jawab')
			->join('soal','soal.id','=','user_jawab.soal_id')
			->join('topik','topik.id','=','soal.topik_id')
			->join('jenjang_topik','topik.id','=','jenjang_topik.topik_id')
			->where('user_id','=', $auth->id)
			->where('jenjang_id','=',$auth->education_id)
			->group_by('jenjang_topik.topik_id')
			->get(array('jenjang_topik.topik_id',DB::raw('SUM(hasil) as jumlah'), DB::raw('(SUM(hasil) * (jenjang_topik.bobot/COUNT(hasil))) as hasil') ));
	}

}