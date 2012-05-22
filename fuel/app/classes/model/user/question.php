<?php
use Orm\Model;

class Model_User_Question extends Model
{
	protected static $_table_name = 'users_questions';

	/**
	 * [$_primary_key description]
	 * @var array
	 */
	protected static $_primary_key = array('question_id','user_id');

	/**
	 * Set properties field in table user_groups
	 * 
	 * @var array
	 */
	protected static $_properties = array(
		'question_id',
		'user_id',
		'answer',
		'result',
		'created_at',
		'updated_at'
	);

	/**
	 * [$_observers description]
	 * @var array
	 */
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

	/**
	 * Set Up ORM belongs to
	 * 
	 * Object Relational Mapper, maps your database table rows to objects 
	 * and it allows you to establish relations between those objects
	 * 
	 * @var array
	 */
	protected static $_belongs_to = array(
	    'user' => array(
	        'key_from' => 'user_id',
	        'model_to' => 'Model_User',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => true,
	    ),
	    'question' => array(
	        'key_from' => 'question_id',
	        'model_to' => 'Model_Question',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	/**
	 * [save_question jawaban]
	 * 
	 * @return mixed
	 */
	public static function save_question ()
	{

		// get data from form submision
		foreach (Input::post('question_id') as $key) 
		{
			$soal = DB::select('*')->from('questions')
					->where('answer',str_replace('ops_', '', Input::post('answer_'.$key)))
					->where('id',$key)
					->execute();

			// cek if data exist
			$cek = DB::select('*')->from('users_questions')
					->where('user_id',Auth::data('id'))
					->where('question_id',$key)
					->execute();
			
			if (count($cek) > 0)
			{
				// update
				$query = DB::update('users_questions');
				$query->set(array(
						'result' 	=> ((count($soal) > 0) ? 1 : 0 ),
						'answer' 	=> str_replace('ops_', '', Input::post('answer_'.$key)),
						'updated_at'=> time(),
				));
				$query->where('user_id',Auth::data('id'));
				$query->where('question_id',$key);
				$query->execute();
			}
			else
			{
				// insert
				$query = DB::insert('users_questions');
				$query->set(array(
						'result' 	=> ((count($soal) > 0) ? 1 : 0 ),
						'answer' 	=> str_replace('ops_', '', Input::post('answer_'.$key)),
						'created_at'=> time(),
						'user_id'	=> Auth::data('id'),
						'question_id' => $key
				));
				$query->execute();
			}
		}
	}

	/**
	 * [get_group kalkulasi jawaban per group]
	 * 
	 * @return [type] [description]
	 */
	public static function get_group()
	{
		return DB::select(DB::expr('topic_id, SUM(result) as jumlah, (SUM(result) * (topics.weight_value/COUNT(result))) as hasil'))
				->from('users_questions')
				->join('questions')->on('questions.id','=','users_questions.question_id')
				->join('topics')->on('topics.id','=','questions.topic_id')
				->where('user_id', Auth::data('id'))
				->group_by('questions.topic_id')
				->as_object()
				->execute();
	}

	/**
	 * Get data jawaban dari calon mahasiswa yang sedang aktif
	 * 
	 * @return array
	 */
	public static function get_jawaban ()
	{
		$query = DB::select('question_id', 'answer')
				->from('users_questions')
				->where('user_id', Auth::data('id'))
				->as_object()
				->execute();

		$arr = array();
		if (count($query) > 0)
		{
			foreach ($query as $key) 
			{
				$arr[$key->question_id] = $key->answer;
			}

			return  $arr;
		}
	}
}