<?php
use Orm\Model;

class Model_Education extends Model
{
	/**
	 * Education Properti
	 * 
	 * @var array
	 */
	protected static $_properties = array(
		'id',
		'name',
		'created_at',
		'updated_at',
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
	 * Set Up ORM has many
	 * 
	 * Object Relational Mapper, maps your database table rows to objects 
	 * and it allows you to establish relations between those objects
	 * 
	 * @var array
	 */
	protected static $_has_many = array(
	    'user_metadata' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_User_Metadata',
	        'key_to' => 'education_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
	    'education_topic' => array(
	    	'key_from' => 'id',
	        'model_to' => 'Model_Education_Topic',
	        'key_to' => 'education_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	/**
	 * Validation
	 * 
	 * @param  [type] $factory [description]
	 * @return [type]          [description]
	 */
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[45]');

		return $val;
	}

	/**
	 * Add method to store dropdown array
	 * 
	 * @return [type] [description]
	 */
	public static function dropdown ()
	{
		$data = parent::find('all');
		if (isset($data))
		{
			$arr = array();
			foreach ($data as $key) 
			{
				$arr[$key->id] = $key->name;
			}
			return $arr;
		}
	}
}
