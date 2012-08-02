<?php

class Create_Topik {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('topik', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('name', 60);
			$table->integer('given_time');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('topik', function($table)
		{
			$table->drop();
		});
	}

}