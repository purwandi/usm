<?php
use Orm\Model;

class Model_User extends Model
{
	protected static $_table_name = 'users';

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
		//'password_reset_hash',
		//'temp_password',
		//'remember_me',
		//'activation_hash',
		'last_login',
		'ip_address',
		'status',
		'activated',
		'updated_at',
		'created_at'
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
	    'user_group' => array(
	    	'key_from'	=> 'id',
	    	'model_to'	=> 'Model_User_Group',
	    	'key_to'	=> 'user_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	public static function validate ($factory, $member = null)
	{
		$val = Validation::forge($factory);
		$val->add_field('username','Username','required');
		$val->add_field('email','Email','required|valid_email');
		$val->add_field('password','Password','required|min_length[6]');
		$val->add_field('confirm_password','Confirm Password','required|match_field[password]');
		$val->add_field('first_name','First name','required');
		$val->add_field('last_name','Last name','required');
		$val->add_field('gender','Gender','required');

		if ($member === 'dosen')
		{
			// $val->add_field();
		}
		elseif ($member === 'mahasiswa')
		{

		}
		return $val;	
	}
}