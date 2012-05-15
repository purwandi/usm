<?php

namespace Fuel\Migrations;

class Create_education_topics
{
	public function up()
	{
		\DBUtil::create_table('education_topics', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'topic_id' => array('constraint' => 11, 'type' => 'int'),
			'education_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('education_topics');
	}
}