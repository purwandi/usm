<?php

class Create_User_Hasil {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_hasil', function($table)
		{
			$table->create();
			$table->integer('user_id');
			$table->string('grade', 2);
			$table->decimal('hasil', 5, 2);
			$table->year('tahun');
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->on_update('cascade');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_hasil', function($table)
		{
			$table->drop();
		});
	}

}