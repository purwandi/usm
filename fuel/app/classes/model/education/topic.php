<?php
use Orm\Model;

class Model_Education_Topic extends Model
{
	protected static $_properties = array(
		'id',
		'topic_id',
		'education_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_belongs_to = array(
		'topic' => array (
	    	'key_from' => 'topic_id',
	        'model_to' => 'Model_Topic',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
	    'education' => array (
	    	'key_from' => 'education_id',
	        'model_to' => 'Model_Education',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('topic_id', 'Topic Id', 'required|valid_string[numeric]');
		$val->add_field('education_id', 'Education Id', 'required|valid_string[numeric]');

		return $val;
	}

	public static function save_data ($id)
	{
		$d = DB::delete('education_topics');
		$d->where('education_id',$id);
		$d->execute();

		foreach (Input::post('topic_id') as $t=>$key)
		{
			$q = DB::insert('education_topics');

			$q->set(array(
				'topic_id' => $t,
				'education_id' => $id,
				'created_at' => time()
			));
			$q->execute();
		}

		return true;
	}

}
