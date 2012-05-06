<?php

class Controller_Member extends Controller_Base {
	
	public $module = 'Member';

	/**
	 * Index action
	 * 
	 * @param  string $member [description]
	 * @return [type]         [description]
	 */
	public function action_index ($member = null)
	{
		// cek member
		if (in_array($member, array('administrator','tata-usaha','dosen','mahasiswa')))
		{	
			$data = Model_User::find('all',array(
				'related' => array(
					'user_metadata' => array(
						'related' => array(
							'topic','education'
						),
					),
					'user_group' => array(
						'where' => array(
							array('group_id',$this->get_groupid($member))
						)
					)
				)
			));
			$this->data['member'] = $data;
			parent :: index ('index/'.$member);	
		}
		else
		{
			parent :: action_404();
		}
		
	}

	public function action_create ($member = null)
	{
		// cek member
		if (in_array($member, array('administrator','tata-usaha','dosen','mahasiswa')))
		{
			if (Input::method()=='POST')
			{
				// create instance to validate
				$val = Model_User::validate('create', $member);

				if ($val->run())
				{
					// create object instance
					$data = Model_User::forge();
					$data->username = Input::post('username');
					$data->email = Input::post('email');
					$data->password =  md5(Input::post('password').Input::post('email'));

					if ($data->save())
					{
						// store last insert id
						$user_id = $data->id;
 
						// create object instance
						$mg = Model_User_Group::forge();
						$mg->user_id = $user_id;
						$mg->group_id = $this->get_groupid($member);

						// create object instance
						$um = Model_User_Metadata::forge();
						$um->user_id = $user_id;
						$um->first_name = Input::post('first_name');
						$um->last_name = Input::post('last_name');
						$um->gender = Input::post('gender');
						$um->dob = Input::post('dob');
						$um->place_dob = Input::post('place_dob');

						if ($member == 'dosen')
						{
							$um->topic_id = Input::post('topic_id');
						}
						elseif($member == 'mahasiswa')
						{
							$um->education_id = Input::post('education_id');
						}

						// save to table user group
						if ($mg->save() && $um->save())
						{
							Session::set_flash('success','Saved');
							// Response::redirect(strtolower($this->module).'/index/'.$member);
						}
						else
						{
							Session::set_flash('wrong','Can not save member');
						}
					}
					else
					{
						Session::set_flash('wrong','Can not save member');
					}
				}
				else
				{
					Session::set_flash('error',$val->show_error());
				}
			}
			if ($member === 'dosen') 
			{
				$this->data['topic'] = Model_Topic::dropdown();
			}
			elseif($member === 'mahasiswa')
			{
				$this->data['education'] = Model_Education::dropdown();
			}

			$this->data['member'] = '';
			parent :: create ('create/'.$member);	
		}
		else
		{
			parent :: action_404();
		}
	}

	public function action_update($member,$id = null)
	{
		if (in_array($member, array('administrator','tata-usaha','dosen','mahasiswa')))
		{
			$data = Model_User::find('first',array(
						'related' => array(
							'user_metadata',
							'user_group' => array(
								'where' => array(
									array('group_id',$this->get_groupid($member))
								)
							)
						),
						'where' => array(
							array('id',$id)
						)
					));
			if ($data)
			{
				if (Input::method() == 'POST')
				{
					$val = Model_User::validate('edit');

					if ($val->run())
					{
						$data->username = Input::post('username');
						$data->email = Input::post('email');
						$data->password =  md5(Input::post('password').Input::post('email'));
						$data->user_metadata->first_name = Input::post('first_name');
						$data->user_metadata->last_name = Input::post('last_name');
						$data->user_metadata->gender = Input::post('gender');
						$data->user_metadata->dob = Input::post('dob');
						$data->user_metadata->place_dob = Input::post('place_dob');

						if ($member == 'dosen')
						{
							$data->user_metadata->topic_id = Input::post('topic_id');
						}
						elseif($member == 'mahasiswa')
						{
							$data->user_metadata->education_id = Input::post('education_id');
						}

						if ($data->save())
						{
							Session::set_flash('success','Saved');
							Response::redirect(strtolower($this->module).'/index/'.$member);
						}
						else
						{
							Session::set_flash('wrong','Can not save member');
						}
					}
					else
					{
						Session::set_flash('error',$val->show_error());
					}
				}

				if ($member === 'dosen') 
				{
					$this->data['topic'] = Model_Topic::dropdown();
				}
				elseif($member === 'mahasiswa')
				{
					$this->data['education'] = Model_Education::dropdown();
				}
				$this->data['member'] = $data;
				parent :: update ('create/'.$member);
			}
			else
			{
				parent :: action_404();
			}

		}
		else
		{
			parent :: action_404();
		}
	}

	public function action_delete ($member, $id)
	{
		$data = Model_User::find($id);
		if ($data->delete())
		{
			Response::redirect(strtolower($this->module).'/index/'.$member);
		}
	}

	/**
	 * Get id group member
	 * 
	 * @param  string $member [description]
	 * @return int         [description]
	 */
	private function get_groupid ($member)
	{
		switch ($member) {
			case 'administrator': return 1; break;
			case 'tata-usaha': return 2; break;
			case 'dosen': return 3; break;
			case 'mahasiswa': return 4; break;
			default: return false; break;
		}	
	}
}