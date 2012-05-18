
<?php if (isset($topic->question)):

	$arr = $data = $new = $last = array();

	// store data
	foreach ($topic->question as $key) 
	{
		$arr[$key->id] = $key;
		$data[$key->id] = $key->id;
	}

	// get random key
	$rand = Project::random_key($data);

	// match $arr to $random
	foreach ($rand as $key) 
	{
		$new[$key] = $arr[$key];
	}

	// asign data
	foreach ($new as $key) 
	{
		$last[$key->parent_id][] = $key;
	}

	echo Project::get_acak($last);
	
endif;?>