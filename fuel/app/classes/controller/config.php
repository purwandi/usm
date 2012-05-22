<?php

class Controller_Config extends Controller_Base
{
	
	public $module = 'Config';

	public function before()
	{
		parent :: before ();
	}

	public function action_index()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Configuration::validate('create');

			if ($val->run())
			{
				DB::delete('configuration')->execute();

				$config = Model_Configuration::forge();
				
				$config->nama_universitas = Input::post('nama_universitas');
				$config->alamat_universitas = Input::post('alamat_universitas');
				$config->telp_universitas = Input::post('telp_universitas');
				$config->email_universitas = Input::post('email_universitas');

				$config->nama_fakultas = Input::post('nama_fakultas');
				$config->alamat_fakultas = Input::post('alamat_fakultas');
				$config->telp_fakultas = Input::post('telp_fakultas');
				$config->email_fakultas = Input::post('email_fakultas');
				$config->passing_grade = Input::post('passing_grade');

				if ($config and $config->save())
				{
					Session::set_flash('success', 'Data is saved');
					Response::redirect('config/index');
				}

				else
				{
					Session::set_flash('wrong', 'Could not save config.');
				}
			}
			else
			{
				Session::set_flash('error',$val->show_error());
			}
		}

		$this->data['data'] = Model_Configuration::find('first');
		parent :: index();
	}

}