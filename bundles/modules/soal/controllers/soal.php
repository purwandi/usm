<?php

class Soal_Soal_Controller extends Admin_Controller {

	public function action_index()
	{
		$topik = Topik::find(Auth::user()->topic_id);
		$this->data['topik'] = $topik;
		$this->data['soal'] = $topik->soal()->get();
		return View::make('soal::index', $this->data);
	}

	public function action_insert($mode = null, $parent = 0)
	{
		if ($_POST)
		{
			$val = new Soal;

			if ($mode == 'child' or $mode == 'individu')
			{
				
				if ($val->validate())
				{
					$soal = new Soal;

					$custom = array(
						'mode' => $mode,
						'parent_id' => $parent,
						'topik_id' => Auth::user()->topic_id
					);

					if ($soal->base_save($soal, $custom))
					{
						return Redirect::to('soal')->with('success', 'Simpan data berhasil');
					}
				}
				else
				{
					$this->data['error'] = $val->errors();
				}
			}
			else
			{
				// remove from validate
				$remove = array('ops_1','ops_2','ops_3','ops_4','ops_5','jawaban');

				if ($val->validate($remove))
				{
					$soal = new Soal;

					$custom = array(
						'mode' => 'cerita',
						'parent_id' => '0',
						'topik_id' => Auth::user()->topic_id
					);

					if ($soal->base_save($soal, $custom))
					{
						return Redirect::to('soal')->with('success', 'Simpan data berhasil');
					}
				}
				else
				{
					$this->data['error'] = $val->errors();
				}
			}
		}
		
		switch ($mode) {
			case 'cerita':
				return View::make('soal::insert.cerita', $this->data);
				break;
			
			default:
				return View::make('soal::insert.individu', $this->data);
				break;
		}

		
	}

	public function action_update($mode = null, $parent = 0, $id)
	{
		$this->data['soal'] = Soal::find($id);

		if ($_POST)
		{
			$val = new Soal;

			if ($mode == 'child' or $mode == 'individu')
			{
				
				if ($val->validate())
				{
					$soal = Soal::find($id);

					$custom = array(
						'mode' => $mode,
						'parent_id' => $parent,
						'topik_id' => Auth::user()->topic_id
					);

					if ($soal->base_save($soal, $custom))
					{
						return Redirect::to('soal')->with('success', 'Simpan data berhasil');
					}
				}
				else
				{
					$this->data['error'] = $val->errors();
				}
			}
			else
			{
				// remove from validate
				$remove = array('ops_1','ops_2','ops_3','ops_4','ops_5','jawaban');

				if ($val->validate($remove))
				{
					$soal = Soal::find($id);

					$custom = array(
						'mode' => 'cerita',
						'parent_id' => '0',
						'topik_id' => Auth::user()->topic_id
					);

					if ($soal->base_save($soal, $custom))
					{
						return Redirect::to('soal')->with('success', 'Simpan data berhasil');
					}
				}
				else
				{
					$this->data['error'] = $val->errors();
				}
			}
		}
		
		switch ($mode) {
			case 'cerita':
				return View::make('soal::update.cerita', $this->data);
				break;
			
			default:
				return View::make('soal::update.individu', $this->data);
				break;
		}
	}

	public function action_delete($id)
	{
		$pass = Soal::find($id)->delete();
		return Redirect::to('soal')->with('success', 'Hapus data berhasil');
	}

}