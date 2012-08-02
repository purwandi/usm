<?php

class Users_Hasil extends Base {

	public static $table = 'user_hasil';

	public static function save_data()
	{
		$auth = Auth::user();

		$topik = Users_Topik::group_topik();

		if ($topik)
		{	

			$hasil = DB::first("
				SELECT * FROM passing 
				WHERE (bottom = (SELECT MAX(bottom) FROM passing WHERE bottom <= ".$topik->jumlah.") AND top >=  ".$topik->jumlah.")");

			$query = DB::table('user_hasil')
						->where('user_id','=', $auth->id)
						->first();

			if ($query)
			{
				DB::table('user_hasil')
				->where('user_id','=', $auth->id)
				->update(array(
					'grade' => $hasil->name,
					'hasil' => $topik->jumlah,
					'tahun' => date('Y'),
					'updated_at' => date('Y-m-d H:i:s')
				));
			}
			else
			{
				DB::table('user_hasil')
				->insert(array(
					'grade' => $hasil->name,
					'hasil' => $topik->jumlah,
					'tahun' => date('Y'),
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'user_id' => $auth->id
				));
			}
		}
	}

	public static function data()
	{
		$cond = array(
			'grade' => Input::get('grade'),
			'tanggal' => Input::get('tanggal')
		);

		$h = DB::table('user_hasil');
		$h->join('users','users.id','=','user_hasil.user_id');
		$h->join('jenjang','jenjang.id','=','users.education_id');

		foreach ($cond as $key => $value) 
		{
			if ( ! empty($value))
			{
				if ($key == 'tanggal')
				{
					$h->where(DB::raw('DATE_FORMAT(user_hasil.updated_at, "%y-%m-$d")'),'=', $value);
				}
				else
				{
					$h->where('grade','=', $value);
				}
				
			}
		}

		$alias = array('realname','birthday','name','user_hasil.updated_at as waktu','grade','hasil');

		return static::page($h, 25, $cond, $alias);
	}

}