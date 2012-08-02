<?php

class Create_Jenjang_Topik {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jenjang_topik', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->integer('topik_id', 10);
			$table->integer('jenjang_id', 10);
			$table->integer('bobot', 3);
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
		Schema::table('jenjang_topik', function($table)
		{
			$table->drop();
		});
	}

}