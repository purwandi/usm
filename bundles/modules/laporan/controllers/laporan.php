<?php
/**
 * Ujian Saringan Masuk
 *
 * @package  USM
 * @version  1.0.0
 * @author   Purwandi <pur@purwandi.me>
 * @license  MIT License
 * @link     http://purwandi.me
 */
class Laporan_Laporan_Controller extends Admin_Controller {

	public function action_index()
	{
		$this->data['grade'] = Passing::all();
		$this->data['hasil'] = Users_Hasil::data();
		return View::make('laporan::index', $this->data);
	}

}