<?php

namespace Fuel\Migrations;

class Create_users_topics
{
	public function up()
	{
		\DBUtil::create_table('users_topics', array(
			'topic_id' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'result' => array('constraint' => '5,2', 'type' => 'decimal'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('topic_id','user_id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users_topics');
	}
}