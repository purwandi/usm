<?php
use Orm\Model;

class Model_User_Topic extends Model
{
	protected static $_table_name = 'users_topics';

	protected static $_primary_key = array('topic_id','user_id');

	/**
	 * Set properties field in table user_groups
	 * 
	 * @var array
	 */
	protected static $_properties = array(
		'topic_id',
		'user_id',
		'result',
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
	    ),
	    'topic' => array(
	        'key_from' => 'topic_id',
	        'model_to' => 'Model_Topic',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	public static function save_user_topic ()
	{

		$val = Model_User_Question::get_group();

		if (count($val) > 0)
		{

			foreach ($val as $key) 
			{
				$query = DB::select()->from('users_topics')
							->where('topic_id','=',$key->topic_id)
							->where('user_id','=',Auth::data('id'))
							->execute();

				if (count($query) > 0)
				{
					DB::update('users_topics')
					->set(array(
						'result' => $key->hasil,
						'updated_at' => time()
					))
					->where('topic_id','=',$key->topic_id)
					->where('user_id','=',Auth::data('id'))
					->execute();
				}
				else
				{
					DB::insert('users_topics')
					->set(array(
						'result' => $key->hasil,
						'created_at' => time(),
						'topic_id' => $key->topic_id,
						'user_id' => Auth::data('id')
					))
					->execute();
				}
			}

			return true;
		}
	}

	/**
	 * [get_group kalkulasi jawaban per group]
	 * 
	 * @return [type] [description]
	 */
	public static function get_group()
	{
		return DB::select(DB::expr('SUM(result) as jumlah'))
				->from('users_topics')
				->where('user_id', Auth::data('id'))
				->as_object()
				->execute()
				->current();
	}

	public static function get_topic()
	{
		return static::find('all',array(
			'related' => array(
				'topic'
			),
			'where' => array(
				array('user_id','=',Auth::data('id'))
			)
		));
	}
}