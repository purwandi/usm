<?php

class Users_Kaprodi_Controller extends Admin_Controller {

	public function action_index()
	{
		$this->data['users'] = Member::data('kaprodi');
		return View::make('Users::kaprodi.index', $this->data);
	}

	public function action_insert()
	{
		if ($_POST)
		{
			$val = new Member;

			if ($val->validate(array('topic_id','education_id')))
			{
				if ( ! Member::where('username','=', Input::get('username'))->or_where('email','=', Input::get('email'))->get())
				{
					$user = new Member;

					$custom = array('role_id' => 'kaprodi','password' => Hash::make(Input::get('password')));

					if ($user->base_save($user, $custom))
					{
						return Redirect::to('kaprodi/update/'.$user->id)->with('success', 'Simpan data berhasil');
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

		return View::make('Users::kaprodi.insert', $this->data);
	}

	public function action_update($id)
	{
		$user = Member::find($id);

		if ( ! $user) return Redirect::to('kaprodi/index');

		if ($_POST)
		{
			$val = new Member;

			if ($val->validate(array('topic_id','education_id','password')))
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
					return Redirect::to('kaprodi/update/'.$user->id)->with('success', 'Simpan data berhasil');;
				}
			}
			else
			{
				$this->data['error'] = $val->errors();
			}
		}
		$this->data['user'] = $user;
		return View::make('Users::kaprodi.update', $this->data);
	}

	public function action_delete($id)
	{
		$user = Member::find($id);
		$user->delete();
		return Redirect::to('kaprodi/index')->with('success', 'Hapus data berhasil');
	}

}