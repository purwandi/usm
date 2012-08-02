<?php

class Create_Foreign_Key {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::query('ALTER TABLE `users` ADD CONSTRAINT users_education_id_foreign FOREIGN KEY (`education_id`) REFERENCES `jenjang` (`id`) ON UPDATE cascade');
		DB::query('ALTER TABLE `users` ADD CONSTRAINT users_topic_id_foreign FOREIGN KEY (`topic_id`) REFERENCES `topik` (`id`) ON UPDATE cascade');
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::query('ALTER TABLE `users` DROP FOREIGN KEY `users_topic_id_foreign`, DROP FOREIGN KEY `users_education_id_foreign`;');
		DB::query('ALTER TABLE `users` DROP INDEX `users_education_id_foreign`, DROP INDEX `users_topic_id_foreign`;');
	}

}