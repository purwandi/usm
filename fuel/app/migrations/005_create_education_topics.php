<?php

namespace Fuel\Migrations;

class Create_education_topics
{
	public function up()
	{
		// create table education_topics
		\DBUtil::create_table('education_topics', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'topic_id' => array('constraint' => 11, 'type' => 'int'),
			'education_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));

		// add foreign key
		\DBUtil::add_foreign_key('education_topics', array(
            'constraint' => 'topic_id',
            'key' => 'education_topics_education_topics',
            'reference' => array(
                'table' => 'topics',
                'column' => 'id',
            ),
            'on_update' => 'CASCADE',
            'on_delete' => 'RESTRICT'
        ));

		// add foreign key
        \DBUtil::add_foreign_key('education_topics', array(
            'constraint' => 'education_id',
            'key' => 'education_id_education_topics',
            'reference' => array(
                'table' => 'educations',
                'column' => 'id',
            ),
            'on_update' => 'CASCADE',
            'on_delete' => 'RESTRICT'
        ));
	}

	public function down()
	{
		\DBUtil::drop_table('education_topics');
	}
}