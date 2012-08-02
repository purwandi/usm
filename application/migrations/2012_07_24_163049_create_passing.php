<?php

class Create_Passing {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('passing', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('name', 30);
			$table->decimal('top', 5, 2);
			$table->decimal('bottom', 5, 2);
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
		Schema::table('passing', function($table)
		{
			$table->drop();
		});
	}

}