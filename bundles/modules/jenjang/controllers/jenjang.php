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
class Jenjang_Jenjang_Controller extends Admin_Controller {

	public function action_index()
	{
		$this->data['jenjang'] = Jenjang::data();
		return View::make('jenjang::index', $this->data);
	}

	public function action_insert()
	{
		if ($_POST)
		{
			$val = new Jenjang;

			if ($val->validate())
			{
				if ( ! Jenjang::where('name','=', Input::get('name'))->get())
				{
					$pass = new Jenjang;

					if ($pass->base_save($pass))
					{
						return Redirect::to('jenjang/update/'.$pass->id)->with('success', 'Simpan data berhasil');
					}
				}
				else
				{
					$this->data['error'] = 'Nama jenjang sudah dipakai';
				}
			}
			else
			{
				$this->data['error'] = $val->errors();
			}
		}

		return View::make('jenjang::insert', $this->data);
	}

	public function action_update($id)
	{
		$pass = Jenjang::find($id);

		if ( ! $pass) return Redirect::to('jenjang/index');

		if ($_POST)
		{
			$val = new Jenjang;

			if ($val->validate())
			{
				$pass = Jenjang::find($id);
				
				if ($pass->base_save($pass))
				{
					return Redirect::to('jenjang/update/'.$pass->id)->with('success', 'Simpan data berhasil');;
				}
			}
			else
			{
				$this->data['error'] = $val->errors();
			}
		}
		$this->data['jenjang'] = $pass;
		return View::make('jenjang::update', $this->data);
	}

	public function action_delete($id)
	{
		$pass = Jenjang::find($id);
		$pass->delete();
		return Redirect::to('jenjang/index')->with('success', 'Hapus data berhasil');
	}

}