<?php

class Create_Foreign_Key_Topik {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::query('ALTER TABLE `jenjang_topik` ADD CONSTRAINT jenjang_topik_topik_id_foreign FOREIGN KEY (`topik_id`) REFERENCES `topik` (`id`) ON UPDATE cascade');
		DB::query('ALTER TABLE `jenjang_topik` ADD CONSTRAINT jenjang_topik_jenjang_id_foreign FOREIGN KEY (`jenjang_id`) REFERENCES `jenjang` (`id`) ON UPDATE cascade');
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::query('ALTER TABLE `jenjang_topik` DROP FOREIGN KEY `jenjang_topik_topik_id_foreign`, DROP FOREIGN KEY `jenjang_topik_jenjang_id_foreign`;');
		DB::query('ALTER TABLE `jenjang_topik` DROP INDEX `jenjang_topik_topik_id_foreign`, DROP INDEX `jenjang_topik_jenjang_id_foreign`;');
	}

}