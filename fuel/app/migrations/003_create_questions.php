<?php

namespace Fuel\Migrations;

class Create_questions
{
	public function up()
	{
		\DBUtil::create_table('questions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('type' => 'text'),
			'ops_1' => array('type' => 'text'),
			'ops_2' => array('type' => 'text'),
			'ops_3' => array('type' => 'text'),
			'ops_4' => array('type' => 'text'),
			'ops_5' => array('type' => 'text'),
			'answer' => array('constraint' => 15, 'type' => 'varchar'),
			'parent_id' => array('constraint' => 11, 'type' => 'int'),
			'topic_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('questions');
	}
}