<?php
use Orm\Model;

class Model_Group extends Model
{
	protected static $_properties = array(
		'id',
		'name'
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[45]');

		return $val;
	}

}