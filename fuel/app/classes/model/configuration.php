<?php
use Orm\Model;

class Model_Configuration extends Model
{
	protected static $_table_name = 'configuration';

	/**
	 * Set properties field in table configuration
	 * 
	 * @var array
	 */
	protected static $_properties = array(
		'id',
		'nama_universitas',
		'alamat_universitas',
		'telp_universitas',
		'email_universitas',
		'nama_fakultas',
		'alamat_fakultas',
		'telp_fakultas',
		'email_fakultas',
		'passing_grade',
		'kuota',
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
	 * Validate form
	 * 
	 * @param  [type] $factory [description]
	 * @param  [type] $member  [description]
	 * @return [type]          [description]
	 */
	public static function validate ($factory, $member = null)
	{
		$val = Validation::forge($factory);
		$val->add_field('nama_universitas','Nama Universitas','required');
		$val->add_field('alamat_universitas','Alamat Universitas','required');
		$val->add_field('telp_universitas','Telp Universitas','required|valid_string[numeric]');
		$val->add_field('email_universitas','Email Universitas','required|valid_email');
		$val->add_field('nama_fakultas','Nama Fakultas','required');
		$val->add_field('alamat_fakultas','Alamat Fakultas','required');
		$val->add_field('telp_fakultas','Telp Fakultas','required|valid_string[numeric]');
		$val->add_field('email_fakultas','Email Fakultas','required|valid_email');
		$val->add_field('passing_grade','Passing Grade','required|valid_string[numeric]');
		$val->add_field('kuota','Kuota','required|valid_string[numeric]');

		return $val;	
	}

}