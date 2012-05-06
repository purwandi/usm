<?php

namespace Fuel\Migrations;

class Add_topik_id_on_user_metadata
{
	public function up()
	{
		\DBUtil::add_fields('users_metadata', array(
			'topic_id' => array('constraint' => 50, 'type' => 'varchar')
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('users_metadata',array('topic_id'));
	}
}