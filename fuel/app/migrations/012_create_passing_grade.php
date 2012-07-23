<?php

namespace Fuel\Migrations;

class Create_passing_grade
{
	public function up()
	{
		\DBUtil::create_table('passing_grade', array(
			'id'  => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 10, 'type' => 'varchar'),
			'top' => array('constraint' => '5,2', 'type' => 'decimal'),
			'bottom' => array('constraint' => '5,2', 'type' => 'decimal'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('passing_grade');
	}
}