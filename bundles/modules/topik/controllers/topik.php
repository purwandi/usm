<?php

class Topik_Topik_Controller extends Admin_Controller {

	public function action_index()
	{
		$this->data['topik'] = Topik::data();
		return View::make('topik::index', $this->data);
	}

	public function action_insert()
	{
		if ($_POST)
		{
			$val = new Topik;

			if ($val->validate())
			{
				if ( ! Topik::where('name','=', Input::get('name'))->get())
				{
					$pass = new Topik;

					if ($pass->base_save($pass))
					{
						return Redirect::to('topik/update/'.$pass->id)->with('success', 'Simpan data berhasil');
					}
				}
				else
				{
					$this->data['error'] = 'Nama topik sudah dipakai';
				}
			}
			else
			{
				$this->data['error'] = $val->errors();
			}
		}

		return View::make('topik::insert', $this->data);
	}

	public function action_update($id)
	{
		$pass = Topik::find($id);

		if ( ! $pass) return Redirect::to('topik/index');

		if ($_POST)
		{
			$val = new Topik;

			if ($val->validate())
			{
				$pass = Topik::find($id);
				
				if ($pass->base_save($pass))
				{
					return Redirect::to('topik/update/'.$pass->id)->with('success', 'Simpan data berhasil');;
				}
			}
			else
			{
				$this->data['error'] = $val->errors();
			}
		}
		$this->data['topik'] = $pass;
		return View::make('topik::update', $this->data);
	}

	public function action_delete($id)
	{
		$pass = Topik::find($id);
		$pass->delete();
		return Redirect::to('topik/index')->with('success', 'Hapus data berhasil');
	}

}