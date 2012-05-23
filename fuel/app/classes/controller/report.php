<?php 

class Controller_Report extends Controller_Base 
{
	public $module = 'Report';
	
	public function before()
	{
		parent :: before ();
	}

	public function action_index($date = null, $mode = null)
	{
		if ( ! $mode && ! $date) Response::redirect('report/daily');

		$query = DB::select()
					->from('users_results')
					->join('users_metadata')->on('users_results.user_id','=','users_metadata.user_id')
					->where('is_qualified',$mode)
					->where(DB::expr('FROM_UNIXTIME(updated_at,"%Y-%m-%d")'),$date)
					->as_object()->execute();

		$this->data['data'] = $query ;

		parent :: index ();
	}

	public function action_daily()
	{
		$query = DB::select(DB::expr('
					SUM(CASE WHEN(is_qualified = "qualified") THEN 1 ELSE 0 END) as qua,
					SUM(CASE WHEN(is_qualified = "not-qualified") THEN 1 ELSE 0 END) as not_qua,
					COUNT(user_id) as total,
					FROM_UNIXTIME(updated_at,"%Y-%m-%d") as hari
				'))
				->from('users_results')
				->group_by(DB::expr('FROM_UNIXTIME(updated_at,"%Y-%m-%d")'))
				->as_object()
				->execute();

		$this->data['data'] = $query;
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