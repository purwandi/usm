<?php

namespace Fuel\Migrations;

class Create_users {

	public function up()
	{
		\DBUtil::create_table('users', array(
			'id'                  => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'username'            => array('constraint' => 50, 'type' => 'varchar'),
			'email'               => array('constraint' => 50, 'type' => 'varchar'),
			'password'            => array('constraint' => 32, 'type' => 'varchar'),
			'ip_address'		  => array('constraint' => 50, 'type' => 'varchar'),
			'attempt'			  => array('constraint' => array('yes','no'), 'type' => 'enum','default' => 'no'),
			'updated_at'          => array('constraint' => 11, 'type' => 'int'),
			'created_at'          => array('constraint' => 11, 'type' => 'int')
		), array('id'), true, 'InnoDB');

		\DBUtil::create_table('users_metadata', array(
			'user_id'    => array('constraint' => 11, 'type' => 'int'),
			'first_name' => array('constraint' => 50, 'type' => 'varchar'),
			'last_name'  => array('constraint' => 50, 'type' => 'varchar'),
			'gender'  => array('type' => 'enum', 'constraint' => array('M','F'),'default' => 'M'),
			'dob'  => array('type' => 'date'),
			'place_dob'  => array('constraint' => 50, 'type' => 'varchar'),
			'education_id'  => array('constraint' => 11, 'type' => 'int'),
			'topic_id'  => array('constraint' => 11, 'type' => 'int'),
		), array('user_id'), true, 'InnoDB');

		\DBUtil::create_table('groups', array(
			'id'       => array('constraint' => 11,  'type' => 'int', 'auto_increment' => true),
			'name'     => array('constraint' => 30, 'type' => 'varchar'),
		), array('id'), true, 'InnoDB');

		\DBUtil::create_table('users_groups', array(
			'user_id'  => array('constraint' => 11, 'type' => 'int'),
			'group_id' => array('constraint' => 11, 'type' => 'int'),
		), array('id'), true, 'InnoDB');


		// add foreign key for users_metadata topic
		\DBUtil::add_foreign_key('users_metadata', array(
            'constraint' => 'topic_id',
            'key' => 'education_topics_users_metadata',
            'reference' => array(
                'table' => 'topics',
                'column' => 'id',
            ),
            'on_update' => 'CASCADE',
            'on_delete' => 'RESTRICT'
        ));

        // add foreign key for users_metadata topic
        \DBUtil::add_foreign_key('users_metadata', array(
            'constraint' => 'education_id',
            'key' => 'education_id_users_metadata',
            'reference' => array(
                'table' => 'educations',
                'column' => 'id',
            ),
            'on_update' => 'CASCADE',
            'on_delete' => 'RESTRICT'
        ));

        // foreign key users_groups user
		\DBUtil::add_foreign_key('users_groups', array(
            'constraint' => 'user_id',
            'key' => 'user_id_users_groups',
            'reference' => array(
                'table' => 'users',
                'column' => 'id',
            ),
            'on_update' => 'CASCADE',
            'on_delete' => 'RESTRICT'
        ));

        // foreign key users_groups group
		\DBUtil::add_foreign_key('users_groups', array(
            'constraint' => 'group_id',
            'key' => 'group_id_users_groups',
            'reference' => array(
                'table' => 'groups',
                'column' => 'id',
            ),
            'on_update' => 'CASCADE',
            'on_delete' => 'RESTRICT'
        ));
	}

	public function down()
	{
		\DBUtil::drop_table('users_groups');
		\DBUtil::drop_table('users_metadata');
		\DBUtil::drop_table('users');
		\DBUtil::drop_table('groups');
		
	}
}
