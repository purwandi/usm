<?php
use Orm\Model;

class Model_Question extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'ops_1',
		'ops_2',
		'ops_3',
		'ops_4',
		'ops_5',
		'answer',
		'parent_id',
		'topic_id',
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
		$val->add_field('name', 'Name', 'required');
		$val->add_field('ops_1', 'Ops 1', 'required');
		$val->add_field('ops_2', 'Ops 2', 'required');
		$val->add_field('ops_3', 'Ops 3', 'required');
		$val->add_field('ops_4', 'Ops 4', 'required');
		$val->add_field('ops_5', 'Ops 5', 'required');
		$val->add_field('answer', 'Answer', 'required|max_length[15]');
		$val->add_field('parent_id', 'Parent Id', 'required|valid_string[numeric]');
		$val->add_field('topic_id', 'Topic Id', 'required|valid_string[numeric]');

		return $val;
	}
}
