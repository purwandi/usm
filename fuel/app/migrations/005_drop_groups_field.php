<?php

namespace Fuel\Migrations;

class Drop_groups_field
{
	public function up()
	{
		\DBUtil::drop_fields('groups', array('level','is_admin','parent'));
	}

	public function down()
	{
		\DBUtil::add_fields('groups', array(
			'level' => array('constraint' => 11, 'type' => 'int'),
			'is_admin' => array('constraint' => 1, 'type' => 'tinyint'),
			'parent'	=> array('constraint' => 11, 'type' => 'int'),
		));
	}
}