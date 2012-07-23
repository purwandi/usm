<?php

namespace Fuel\Migrations;

class Create_users_questions
{
	public function up()
	{
		\DBUtil::create_table('users_questions', array(
			'question_id' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'answer' => array('constraint' => 1, 'type' => 'int', 'default'=> '0'),
			'result' => array('constraint' => 1, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('question_id','user_id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users_questions');
	}
}