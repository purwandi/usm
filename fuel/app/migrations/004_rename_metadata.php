<?php

namespace Fuel\Migrations;

class Rename_metadata
{
	public function up()
	{
		\DBUtil::add_fields('users_metadata', array(
			'gender' => array('constraint' => 45, 'type' => 'varchar'),
			'dob' => array('type' => 'date'),
			'place_dob'	=> array('constraint' => 200, 'type' => 'varchar'),
			'education_id'	=> array('constraint' => 11, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('users_metadata',array('gender','dob','place_dob','education_id'));
	}
}