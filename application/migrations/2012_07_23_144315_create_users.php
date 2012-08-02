<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('username', 30);
			$table->string('email', 40)->unique();;
			$table->string('password', 64);
			$table->string('realname', 80);
			$table->enum('gender', array('M','F'),'M');
			$table->date('birthday');
			$table->integer('education_id', 10)->nullable();
			$table->integer('topic_id', 10)->nullable();
			$table->enum('role_id', array('kaprodi','tatausaha','dosen','caba'))->nullable();
			$table->enum('is_attempt',array('0','1'),'0');
			$table->datetime('start_time')->nullable();
			$table->datetime('end_time')->nullable();
			$table->timestamps();
		});

		DB::table('users')->insert(array(
            'username' => 'Purwandi',
            'realname' => 'Purwandi',
            'email' => 'general@ui.com',
            'password' => Hash::make('222'),
            'role_id' => 'kaprodi',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
			$table->drop();
		});
	}

}