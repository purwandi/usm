<?php 

class Controller_Report extends Controller_Base 
{
	public $module = 'Report';
	
	public function before()
	{
		parent :: before ();
	}

	public function action_index()
	{
		parent :: index ();
	}

	public function action_daily()
	{
		parent :: index ('daily');
	}

	public function action_result($mode = null)
	{
		if ( ! $mode) Response::redirect('report/result/qualified');

		$this->data['data'] = Model_User::find('all',array(
			'related' => array(
				'user_metadata',
				'user_result' => array(
					'where' => array(
						array('is_qualified','=',$mode)
					)
				)
			)
		));
		parent :: index ('result');
	}
}