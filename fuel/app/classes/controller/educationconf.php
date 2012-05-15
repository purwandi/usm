<?php

class Controller_Educationconf extends Controller_Base {

	public $module = 'Educationconf';
	
	public function action_update($id = null)
	{
		// if form submision
		if (Input::method() == 'POST')
		{
			if (Model_Education_Topic::save_data($id))
			{
				Session::set_flash('success', 'Data is saved');
			}
			else
			{
				Session::set_flash('error', 'Error');
			}
		}

		// get data from model education
		$this->data['data'] = Model_Education::find('first',array(
				'related'=>array('education_topic'),
				'where' => array(
					array('id', $id)
				)
			));

		// data
		$arr = array();
		foreach ($this->data['data']->education_topic as $key) 
		{
			$arr[$key->topic_id] = $key->topic_id;
		}

		$this->data['arr'] = $arr;
		// get data from model topic
		$this->data['topic'] = Model_Topic::find('all');
		parent :: update();
	}
}