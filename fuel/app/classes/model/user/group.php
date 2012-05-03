<?php
use Orm\Model;

class Model_User_Group extends Model
{
	protected static $_table_name = 'users_groups';

	/**
	 * Set properties field in table user_groups
	 * 
	 * @var array
	 */
	protected static $_properties = array(
		'id',
		'user_id',
		'group_id'
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
	    /*,
	    'group' => array(
	        'key_from' => 'group_id',
	        'model_to' => 'Model_Group',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => true,
	    )*/
	);
}