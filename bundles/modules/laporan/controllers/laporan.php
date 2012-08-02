<?php

class Laporan_Laporan_Controller extends Admin_Controller {

	public function action_index()
	{
		$this->data['grade'] = Passing::all();
		$this->data['hasil'] = Users_Hasil::data();
		return View::make('laporan::index', $this->data);
	}

}