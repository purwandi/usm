<?php

class Project 
{
	public static function get_level ($data, $parent = 0)
	{

		if (isset($data[$parent]))
		{
			$html = '';

			foreach ($data[$parent] as $key) 
			{
				$html .= '<div class="media">';
				$html .= '
				<div class="pull-left" href="#">
					<h1 class="media-object">#'.str_pad($key->id, 3, "0", STR_PAD_LEFT).'</h1>
				</div>
				<div class="media-body">'.$key->name.'
					<div class="qaction">';
						if ($key->mode != 'child' and $key->mode != 'individu')
						{
							$html .= HTML::link('soal/insert/child/'.$key->id,'Tambah soal anak cerita');
						}

						$html .= HTML::link('soal/update/'.$key->mode.'/'.$key->parent_id.'/'.$key->id,'Update');
						$html .= HTML::link('soal/delete/'.$key->id,'Delete',array('onclick' => "return confirm('Are you sure?')"));

			$html .='</div>';
				
				$child = static::get_level($data, $key->id);

				if ($child)
				{
					$html .= $child;
				}
				
				$html .= '</div></div>';							
			}

			return $html;
		}
		else
		{
			return false;
		}
	}
	
	public static function get_acak ($data,  $parent = 0, $no = 0)
	{

		// cek apakah datanya kosong
		if (isset($data[$parent]))
		{
			// set variabel
			$html = '';

			// loop data
			foreach ($data[$parent] as $key) 
			{
				
				$html .= '<div class="media">';

				// store data jika memiliki child, panggil method sendiri
				$child = static::get_acak($data, $key->id, $no);

				// jika child maka no yang dipakai nomor terakhir yang berasal dari child
				if ($child)
					$no = $child['no'];
				else
					$no++;

				// jika soal bukan cerita maka tampilkan nomor
				if ($key->mode != 'cerita')
				{	
					$html .= '
						<div class="pull-left"><h1 class="media-object">#'.$no.'</h1>
						</div>'.Form::hidden('soal_id[]',$key->id);
				}
				
				$html .='<div class="media-body">'.$key->name;
						if ($key->mode != 'cerita')
						{
							// buat variabel random
							$opsi = static::random_key(array('1','2','3','4','5'));
							$html .='<div class="control-group"><div class="controls">';

							// loop var jawab
							foreach ($opsi as $val) 
							{
								$html .='<label class="radio">';
								$html .= Form::radio('jawaban_'.$key->id,'jawaban_'.$val);								
								$html .= $key->{'ops_'.$val}.'</label>';
							}
							$html .=' </div></div>';
						}
				
				if ($child)
				{
					$html .= $child['html'];
				}
				
				$html .= '</div></div>';				
			}

			// return array
			return array(
				'no' 	=> $no,
				'html' 	=> $html
			);
		}
		else
		{
			return false;
		}
	}

	public static function random_key ($arr = array())
	{
		shuffle($arr);
		$data = array();
		foreach ($arr as $key => $value) 
		{
			$data[$value] = $value;
		}
		return $data;
	}
}