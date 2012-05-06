<?php

namespace Fuel\Migrations;

class Add_tb_session
{
	public function up()
	{
		\DBUtil::create_table('sessions', array(
			'session_id' => array('constraint' => 40, 'type' => 'varchar'),
			'previous_id' => array('constraint' => 40, 'type' => 'varchar'),
			'user_agent' => array('type' => 'text'),
			'ip_hash' => array('constraint' => 32, 'type' => 'char'),
			'created' => array('constraint' => 11, 'type' => 'int'),
			'updated' => array('constraint' => 11, 'type' => 'int'),
			'payload' => array('type'=>'longtext')
		), array('session_id'));

		\DBUtil::create_index('sessions', 'previous_id','sessions_previous_id','UNIQUE');
	}

	public function down()
	{
		\DBUtil::drop_index('sessions', 'sessions_previous_id');
		
		\DBUtil::drop_table('sessions');
	}
}