<?php
use Orm\Model;

class Model_Topic extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'time_limit',
		'weight_value',
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

	protected static $_has_many = array(
	    'user_metadata' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_User_Metadata',
	        'key_to' => 'topic_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[80]');
		$val->add_field('time_limit', 'Time Limit', 'required|valid_string[numeric]');
		$val->add_field('weight_value', 'Weight value', 'required|valid_string[numeric]');

		return $val;
	}

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
