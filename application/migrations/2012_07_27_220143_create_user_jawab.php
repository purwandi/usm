<?php

class Create_User_Jawab {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_jawab', function($table)
		{
			$table->create();
			$table->integer('user_id');
			$table->integer('soal_id', 10);
			$table->integer('jawaban', 1);
			$table->integer('hasil', 1);
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->on_update('cascade');
            $table->foreign('soal_id')->references('id')->on('soal')->on_update('cascade');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_jawab', function($table)
		{
			$table->drop();
		});
	}

}