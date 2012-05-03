<?php

namespace Fuel\Migrations;

class Add_pembobotan_topik
{
	public function up()
	{
		\DBUtil::add_fields('topics', array(
			'weight_value' => array('constraint' => 11, 'type' => 'int')
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('topics',array('weight_value'));
	}
}