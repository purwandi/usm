<?php
use Orm\Model;

class Model_User_Metadata extends Model
{
	protected static $_table_name = 'users_metadata';

	protected static $_primary_key = array('user_id');

	/**
	 * Set properties field in table user_metadata
	 * 
	 * @var array
	 */
	protected static $_properties = array(
		'user_id',
		'first_name',
		'last_name',
		'gender',
		'dob',
		'place_dob',
		'education_id'
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
	        'cascade_delete' => false,
	    )
	);
}