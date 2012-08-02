<?php

class Users_Topik extends Base {

	public static $table = 'user_topik';

	public static function save_data()
	{
		$auth = Auth::user();

		$soal = Users_Jawab::group_soal();

		if ($soal)
		{
			foreach ($soal as $key)
			{
				$query = DB::table('user_topik')
							->where('topik_id','=',$key->topik_id)
							->where('user_id','=', $auth->id)
							->first();

				if ($query)
				{
					DB::table('user_topik')
					->where('topik_id','=',$key->topik_id)
					->where('user_id','=', $auth->id)
					->update(array(
						'hasil' => $key->hasil,
						'updated_at' => date('Y-m-d H:i:s')
					));
				}
				else
				{
					DB::table('user_topik')
					->insert(array(
						'hasil' => $key->hasil,
						'created_at' => date('Y-m-d H:i:s'),
						'topik_id' => $key->topik_id,
						'user_id' => $auth->id
					));
				}
			}
		}
	}

	public static function group_topik()
	{
		return DB::table('user_topik')
			->where('user_id','=', Auth::user()->id)
			->first(array(DB::raw('SUM(hasil) as jumlah')));
	}

	public function topik()
	{
		return $this->belongs_to('Topik');
	}

}