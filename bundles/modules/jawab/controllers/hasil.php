<?php
/**
 * Ujian Saringan Masuk
 *
 * @package  USM
 * @version  1.0.0
 * @author   Purwandi <pur@purwandi.me>
 * @license  MIT License
 * @link     http://purwandi.me
 */
class Jawab_Hasil_Controller extends Admin_Controller {

	/**
	 * Index hasil
	 * 
	 * @return mixed
	 */
	public function action_index()
	{
		// get session data
		$auth = Auth::user();

		$this->data['hasil'] = Users_Hasil::where('user_id','=',$auth->id)->first();
		$this->data['topik'] = DB::table('user_topik')
			->join('topik','topik.id','=','user_topik.topik_id')
			->where('user_id','=',$auth->id)
			->get();
			
		return View::make('jawab::hasil', $this->data);
	}
}