<?php
use Orm\Model;

class Model_Group extends Model
{
	protected static $_properties = array(
		'id',
		'name'
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
	    'user_group' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_User_Group',
	        'key_to' => 'group_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[45]');
		return $val;
	}

}