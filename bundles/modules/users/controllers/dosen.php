<?php

class Users_Dosen_Controller extends Admin_Controller {

	public function action_index()
	{
		$this->data['users'] = Member::data('dosen');
		return View::make('Users::dosen.index', $this->data);
	}

	public function action_insert()
	{
		if ($_POST)
		{
			$val = new Member;

			if ($val->validate(array('education_id')))
			{
				if ( ! Member::where('username','=', Input::get('username'))->or_where('email','=',Input::get('email'))->get())
				{
					$user = new Member;

					$custom = array('role_id' => 'dosen','password' => Hash::make(Input::get('password')));

					if ($user->base_save($user, $custom))
					{
						return Redirect::to('dosen/update/'.$user->id)->with('success', 'Simpan data berhasil');
					}
				}
				else
				{
					$this->data['error'] = 'Username atau email  sudah dipakai';
				}
			}
			else
			{
				$this->data['error'] = $val->errors();
			}
		}

		$this->data['topik'] = Topik::dropdown();
		return View::make('Users::dosen.insert', $this->data);
	}

	public function action_update($id)
	{
		$user = Member::find($id);

		if ( ! $user) return Redirect::to('dosen/index');

		if ($_POST)
		{
			$val = new Member;

			if ($val->validate(array('education_id','password')))
			{
				$user = Member::find($id);

				if (Input::get('password'))
				{
					$custom = array('password' => Hash::make(Input::get('password')));
				}
				else
				{
					$custom = array();
				}
				
				if ($user->base_save($user, $custom))
				{
					return Redirect::to('dosen/update/'.$user->id)->with('success', 'Update data berhasil');
				}
			}
			else
			{
				$this->data['error'] = $val->errors();
			}
		}
		$this->data['topik'] = Topik::dropdown();
		$this->data['user'] = $user;
		return View::make('Users::dosen.update', $this->data);
	}

	public function action_delete($id)
	{
		$user = Member::find($id);
		$user->delete();
		return Redirect::to('dosen/index')->with('success', 'Hapus data berhasil');
	}

}