<?php

class Passing_Passing_Controller extends Admin_Controller {

	public function action_index()
	{
		$this->data['passings'] = Passing::data();
		return View::make('passing::index', $this->data);
	}

	public function action_insert()
	{
		if ($_POST)
		{
			$val = new Passing;

			if ($val->validate())
			{
				if ( ! Passing::where('name','=', Input::get('name'))->get())
				{
					$pass = new Passing;

					if ($pass->base_save($pass))
					{
						return Redirect::to('passing/update/'.$pass->id)->with('success', 'Simpan data berhasil');
					}
				}
				else
				{
					$this->data['error'] = 'Nama passing grade sudah dipakai';
				}
			}
			else
			{
				$this->data['error'] = $val->errors();
			}
		}

		return View::make('passing::insert', $this->data);
	}

	public function action_update($id)
	{
		$pass = Passing::find($id);

		if ( ! $pass) return Redirect::to('passing/index');

		if ($_POST)
		{
			$val = new Passing;

			if ($val->validate())
			{
				$pass = Passing::find($id);
				
				if ($pass->base_save($pass))
				{
					return Redirect::to('passing/update/'.$pass->id)->with('success', 'Simpan data berhasil');;
				}
			}
			else
			{
				$this->data['error'] = $val->errors();
			}
		}
		$this->data['passings'] = $pass;
		return View::make('passing::update', $this->data);
	}

	public function action_delete($id)
	{
		$pass = Passing::find($id);
		$pass->delete();
		return Redirect::to('passing/index')->with('success', 'Hapus data berhasil');
	}

}