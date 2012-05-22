<?php
use Orm\Model;

class Model_User_Result extends Model
{
	protected static $_table_name = 'users_results';

	protected static $_primary_key = array('user_id');

	/**
	 * Set properties field in table user_groups
	 * 
	 * @var array
	 */
	protected static $_properties = array(
		'user_id',
		'result',
		'is_qualified',
		'years',
		'created_at',
		'updated_at'
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	/**
	 * Set Up ORM belongs to
	 * 
	 * Object Relational Mapper, maps your database table rows to objects 
	 * and it allows you to establish relations between those objects
	 * 
	 * @var array
	 */
	protected static $_belongs_to = array(
	    'user' => array(
	        'key_from' => 'user_id',
	        'model_to' => 'Model_User',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => true,
	    )
	);

	public static function save_results()
	{
		$hasil = Model_User_Topic::get_group();

		$cek = static::find('first',array(
			'where' => array(
				array('user_id',Auth::data('id'))
			)
		));

		$pg = Model_Configuration::find('first');

		if (count($cek) > 0)
		{
			$q = DB::update('users_results')
				->set(array(
					'result' => $hasil->jumlah,
					'is_qualified' => ($hasil->jumlah >= $pg->passing_grade) ? 'lulus':'tidak_lulus',
					'years' => date('Y'),
					'updated_at' => time()
				))
				->where('user_id',Auth::data('id'))
				->execute();
		}
		else
		{
			$q = DB::insert('users_results')
				->set(array(
					'result' => $hasil->jumlah,
					'is_qualified' => ($hasil->jumlah >= $pg->passing_grade) ? 'lulus':'tidak_lulus',
					'years' => date('Y'),
					'user_id' => Auth::data('id'),
					'created_at' => time()
				))
				->execute();
		}
	}
}