<?php

namespace Fuel\Migrations;

class Add_mode_on_question
{
	public function up()
	{
		\DBUtil::add_fields('questions', array(
			'mode' => array('constraint' => 10, 'type' => 'varchar')
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('questions',array('mode'));
	}
}