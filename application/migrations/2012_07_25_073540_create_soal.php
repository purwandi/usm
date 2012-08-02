<?php

class Create_Soal {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('soal', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->text('name');
			$table->text('ops_1')->nullable();
			$table->text('ops_2')->nullable();
			$table->text('ops_3')->nullable();
			$table->text('ops_4')->nullable();
			$table->text('ops_5')->nullable();
			$table->integer('jawaban', 1)->defaults(0);
			$table->integer('parent_id', 10)->nullable();
			$table->enum('mode', array('cerita','individu','child'))->nullable();
			$table->integer('topik_id', 10);
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
		Schema::table('soal', function($table)
		{
			$table->drop();
		});
	}

}