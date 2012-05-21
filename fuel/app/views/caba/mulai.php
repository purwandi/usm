
<?php if (isset($topic->question)):

	$arr = $data = $new = $last = array();
	$no = 1;

	// simpan data topic ke variabel sementara $arr
	// simpan id soal ke variabel data
	foreach ($topic->question as $key) 
	{
		$arr[$key->id] = $key;
		$data[$key->id] = $key->id;
	}

	// membuat nilai random id no soal
	// simpan di variabel $rand
	$rand = Project::random_key($data);

	// loop var rand dan cocokan dengan id $arr
	// 
	foreach ($rand as $key) 
	{
		$new[$key] = $arr[$key];
	}

	// asign data
	foreach ($new as $key) 
	{
		if ($key->mode !== 'cerita')
		{
			$last[$key->parent_id][] = $key;
		}
		else
		{
			$last[$key->parent_id][] = $key;
		}
		
	}

	$data = Project::get_acak($last);
	echo $data['html'];
	
endif;?>