<?php

class Jawab_Hasil_Controller extends Admin_Controller {

	public function action_index()
	{
		$auth = Auth::user();
		$this->data['hasil'] = Users_Hasil::where('user_id','=',$auth->id)->first();
		$this->data['topik'] = DB::table('user_topik')->join('topik','topik.id','=','user_topik.topik_id')->where('user_id','=',$auth->id)->get();
		return View::make('jawab::hasil', $this->data);
	}
}