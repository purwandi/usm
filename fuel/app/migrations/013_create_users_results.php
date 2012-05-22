<?php

namespace Fuel\Migrations;

class Create_users_results
{
	public function up()
	{
		\DBUtil::create_table('users_results', array(
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'result' => array('constraint' => '5,2', 'type' => 'decimal'),
			'is_qualified' => array('constraint' => 20, 'type' => 'varchar'),
			'years' => array('type' => 'year'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('user_id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users_results');
	}
}