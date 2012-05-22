<?php

namespace Fuel\Migrations;

class Create_configuration
{
	public function up()
	{
		\DBUtil::create_table('configuration', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'nama_universitas' => array('constraint' => 200, 'type' => 'varchar'),
			'alamat_universitas' => array('type' => 'text'),
			'telp_universitas' => array('constraint' => 20, 'type' => 'varchar'),
			'email_universitas' => array('constraint' => 50, 'type' => 'varchar'),
			'nama_fakultas' => array('constraint' => 200, 'type' => 'varchar'),
			'alamat_fakultas' => array('type' => 'text'),
			'telp_fakultas' => array('constraint' => 20, 'type' => 'varchar'),
			'email_fakultas' => array('constraint' => 50, 'type' => 'varchar'),
			'passing_grade' => array('constraint' => '5,2', 'type' => 'decimal'),
			'kuota' => array('constraint' => 4, 'type' => 'decimal'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('configuration');
	}
}