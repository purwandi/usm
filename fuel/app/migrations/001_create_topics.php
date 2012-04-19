<?php

namespace Fuel\Migrations;

class Create_topics
{
	public function up()
	{
		\DBUtil::create_table('topics', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'id' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 80, 'type' => 'varchar'),
			'time_limit' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('topics');
	}
}