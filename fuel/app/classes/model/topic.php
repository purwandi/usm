<?php
use Orm\Model;

class Model_Topic extends Model
{
	protected static $_properties = array(
		'id',
		'id',
		'name',
		'time_limit',
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('id', 'Id', 'required|valid_string[numeric]');
		$val->add_field('name', 'Name', 'required|max_length[80]');
		$val->add_field('time_limit', 'Time Limit', 'required|valid_string[numeric]');

		return $val;
	}

}
