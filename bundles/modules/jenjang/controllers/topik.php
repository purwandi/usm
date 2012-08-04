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
class Jenjang_Topik_Controller extends Admin_Controller {

	/**
	 * Update jenjang topik
	 * 
	 * @param  int $id
	 * @return mixed
	 */
	public function action_update($id)
	{
		$jenjang = Jenjang::find($id);

		if ($_POST)
		{
			if (Input::get('total') == 100)
			{
				if (count(Input::get('topik_id')) > 0 )
				{
					$jenjang->given_time = Input::get('waktu');
					$jenjang->save();
					
					Jopik::save_data($id);
				}
			}
			else
			{
				$this->data['error'] =  'The total must be 100';
			}
			
		}

		// prepare jawaban
		$topik = Jopik::where('jenjang_id','=',$id)->get();

		$jawab = array();

		// jika topik ada
		if ($topik)
		{
			foreach ($topik as $key) 
			{
				$jawab[$key->topik_id] = array( 'topik_id' => $key->topik_id, 'bobot' => $key->bobot );
			}
		}
		

		$this->data['jawab'] = $jawab;
		$this->data['jenjang'] = $jenjang ;
		$this->data['topik'] = Topik::all();
		return View::make('jenjang::topik', $this->data);
	}

}