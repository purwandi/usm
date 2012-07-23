<?php

namespace Fuel\Migrations;

class Create_configuration
{
	public function up()
	{
		\DBUtil::create_table('configuration', array(
			'name' => array('constraint' => 60, 'type' => 'varchar'),
			'address' => array('type' => 'text'),
			'telp' => array('constraint' => 20, 'type' => 'varchar'),
			'email' => array('constraint' => 50, 'type' => 'varchar'),
			'fakultas_name' => array('constraint' => 60, 'type' => 'varchar'),
			'fakultas_address' => array('type' => 'text'),
			'fakultas_telp' => array('constraint' => 20, 'type' => 'varchar'),
			'fakultas_email' => array('constraint' => 50, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('configuration');
	}
}