<?php

class Controller_Student extends Controller_Base
{
	public $module = 'Student';

	public function action_index()
	{
		// create object instance
		$student = Model_User::find('all',array(
			'related'	=> array(
				'user_metadata',
				'user_group'	=> array(
					'where'	=> array(
						// karena mahasiswa memiliki kontansta 3
						array('group_id',3)
					)
				)
			)
		));

		$data['student'] = $student;

		parent :: index ();
	}

	public function action_create()
	{
		parent :: create('create');
	}

	public function action_update()
	{
		parent :: update('update');
	}

	public function action_view()
	{
		$this->template->title = 'Student / View';
		$this->template->content = View::forge('student/view');
	}

	public function action_delete()
	{
		$this->template->title = 'Student / Delete';
		$this->template->content = View::forge('student/delete');
	}

}
