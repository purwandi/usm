<?php
use Orm\Model;

class Model_User extends Model
{
	/**
	 * Set properties field in table user
	 * 
	 * @var array
	 */
	protected static $_properties = array(
		'id',
		'username',
		'email',
		'password',
		'password_reset_hash',
		'temp_password',
		'remember_me',
		'activation_hash',
		'last_login',
		'ip_address',
		'status',
		'activated'
	);

	/**
	 * Create woorker when tbl is update and create
	 * 
	 * @var array
	 */
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
	 * Set up ORM has one
	 * 
	 * Object Relational Mapper, maps your database table rows to objects 
	 * and it allows you to establish relations between those objects
	 * 
	 * @var array
	 */
	protected static $_has_one = array(
	    'user_metadata' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_User_Metadata',
	        'key_to' => 'user_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
	    'user_group'	=> array(
	    	'key_from'	=> 'id',
	    	'model_to'	=> 'Model_User_Group',
	    	'key_to'	=> 'user_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);
}