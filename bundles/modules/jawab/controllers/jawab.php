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
class Jawab_Jawab_Controller extends Admin_Controller {
	
	public $restful = true;

	/**
	 * Contruct
	 */
	public function __construct()
	{
		parent::__construct();

		// cek if request from ajax request 
        if ( ! Request::ajax())
        {
            return Response::error('500');
        }

        // cek CSRF token
        $this->filter('before','csrf');
	}

	/**
	 * Get soal jawaban untuk pengguna
	 * 
	 * @return mixed
	 */
	public function get_index()
	{
		// store auth
		$auth = Auth::user();
		

		// cek belum pernah melakukan attempt
		if (Member::where('id','=',$auth->id)->where('is_attempt','=','0')->get())
		{
			// store jenjang
			$jenjang = Jenjang::find($auth->education_id);

			// define start and end time
			$start = date('Y-m-d H:i:s');
			$end = strtotime('+ '.$jenjang->given_time.' minute');

			// update data user to set start and end
			$user = Member::find($auth->id);
			$user->start_time = $start;
			$user->end_time = date('Y-m-d H:i:s', $end);
			$user->is_attempt = 1; // to do change into 1
			$user->save();

			// set waktu

			// get data soal dan topik
			$this->data['topik'] = Jopik::with(array('topik', 'topik.soaldata'))
							->where('jenjang_id','=', $auth->education_id)
							->get();

			// render data soal
			$html = new View('jawab::index', $this->data);

			// render halaman waktu habis
	        $habis = new View('jawab::habis');

			$data = array(
				'html' => array(
					'begin' => preg_replace('/[\r\n]/', '',$html->render()),
					'end' => preg_replace('/[\r\n]/', '', $habis->render()),
				),
				'waktu' => date('M d, Y H:i:s', $end),
				'code' => '200', 
			);
		}
		else
		{
			$html = new View('jawab::exist');

			$data = array(
				'html' => preg_replace('/[\r\n]/', '',$html->render()),
				'code' => '302', 
			);
		}
		
		// return json
		return Response::json($data);
	}

	/**
	 * Proses simpan jawaban
	 * 
	 * @return mixed
	 */
	public function post_update()
	{
		// save jawaban
		Users_Jawab::save_data();
		Users_Topik::save_data();
		Users_Hasil::save_data();

		return Response::json(array(
			'html' => 'Simpan data berhasil',
			'code' => '200', 
		));
	}

}