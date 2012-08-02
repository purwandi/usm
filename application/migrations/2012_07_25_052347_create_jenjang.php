<?php

class Create_Jenjang {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jenjang', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('name', 10);
			$table->integer('given_time', 3)->nullable();
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
		Schema::table('jenjang', function($table)
		{
			$table->drop();
		});
	}

}