<?php

class Create_User_Topik {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_topik', function($table)
		{
			$table->create();
			$table->integer('user_id');
			$table->integer('topik_id', 10);
			$table->decimal('hasil', 5, 2);
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->on_update('cascade');
            $table->foreign('topik_id')->references('id')->on('topik')->on_update('cascade');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_topik', function($table)
		{
			$table->drop();
		});
	}

}