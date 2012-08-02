<?php

class Users_Caba_Controller extends Admin_Controller {

	public function action_index()
	{
		$this->data['users'] = Member::data('caba');
		return View::make('Users::caba.index', $this->data);
	}

	public function action_insert()
	{
		if ($_POST)
		{
			$val = new Member;

			if ($val->validate(array('topic_id')))
			{
				if ( ! Member::where('username','=', Input::get('username'))->or_where('email','=',Input::get('email'))->get())
				{
					$user = new Member;

					$custom = array('role_id' => 'caba','password' => Hash::make(Input::get('birthday')));

					if ($user->base_save($user, $custom))
					{
						return Redirect::to('caba/update/'.$user->id)->with('success', 'Simpan data berhasil');
					}
				}
				else
				{
					$this->data['error'] = 'Username atau email sudah dipakai';
				}
			}
			else
			{
				$this->data['error'] = $val->errors();
			}
		}

		$this->data['jenjang'] = Jenjang::dropdown();
		return View::make('Users::caba.insert', $this->data);
	}

	public function action_update($id)
	{
		$user = Member::find($id);

		if ( ! $user) return Redirect::to('caba/index');

		if ($_POST)
		{
			$val = new Member;

			if ($val->validate(array('topic_id','password')))
			{
				$user = Member::find($id);

				if (Input::get('birthday'))
				{
					$custom = array('password' => Hash::make(Input::get('birthday')));
				}
				else
				{
					$custom = array();
				}
				
				if ($user->base_save($user, $custom))
				{
					return Redirect::to('caba/update/'.$user->id)->with('success', 'Simpan data berhasil');;
				}
			}
			else
			{
				$this->data['error'] = $val->errors();
			}
		}

		$this->data['jenjang'] = Jenjang::dropdown();
		$this->data['user'] = $user;
		return View::make('Users::caba.update', $this->data);
	}

	public function action_delete($id)
	{
		$user = Member::find($id);
		$user->delete();
		return Redirect::to('caba/index')->with('success', 'Hapus data berhasil');
	}

	public function action_cetak($id)
	{
		$user = Member::with('education')->where('id','=',$id)->where('role_id','=','caba')->first();

		if ( ! $user) return Redirect::to('caba/index');

		$this->data['user'] = $user;
		return View::make('Users::caba.cetak', $this->data);
	}
}