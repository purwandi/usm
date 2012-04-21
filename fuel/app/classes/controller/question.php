<?php
class Controller_Question extends Controller_Template 
{

	public $template = 'template/layouts/default';

	public function action_index()
	{
		$data['questions'] = Model_Question::find('all');
		$this->template->title = "Questions";
		$this->template->content = View::forge('question/index', $data);

	}

	public function action_view($id = null)
	{
		$data['question'] = Model_Question::find($id);

		$this->template->title = "Question";
		$this->template->content = View::forge('question/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Question::validate('create');
			
			if ($val->run())
			{
				$question = Model_Question::forge(array(
					'name' => Input::post('name'),
					'ops_1' => Input::post('ops_1'),
					'ops_2' => Input::post('ops_2'),
					'ops_3' => Input::post('ops_3'),
					'ops_4' => Input::post('ops_4'),
					'ops_5' => Input::post('ops_5'),
					'answer' => Input::post('answer'),
					'parent_id' => Input::post('parent_id'),
					'topic_id' => Input::post('topic_id'),
				));

				if ($question and $question->save())
				{
					Session::set_flash('success', 'Added question #'.$question->id.'.');

					Response::redirect('question');
				}

				else
				{
					Session::set_flash('error', 'Could not save question.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Questions";
		$this->template->content = View::forge('question/create');

	}

	public function action_edit($id = null)
	{
		$question = Model_Question::find($id);
		$val = Model_Question::validate('edit');

		if ($val->run())
		{
			$question->name = Input::post('name');
			$question->ops_1 = Input::post('ops_1');
			$question->ops_2 = Input::post('ops_2');
			$question->ops_3 = Input::post('ops_3');
			$question->ops_4 = Input::post('ops_4');
			$question->ops_5 = Input::post('ops_5');
			$question->answer = Input::post('answer');
			$question->parent_id = Input::post('parent_id');
			$question->topic_id = Input::post('topic_id');

			if ($question->save())
			{
				Session::set_flash('success', 'Updated question #' . $id);

				Response::redirect('question');
			}

			else
			{
				Session::set_flash('error', 'Could not update question #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$question->name = $val->validated('name');
				$question->ops_1 = $val->validated('ops_1');
				$question->ops_2 = $val->validated('ops_2');
				$question->ops_3 = $val->validated('ops_3');
				$question->ops_4 = $val->validated('ops_4');
				$question->ops_5 = $val->validated('ops_5');
				$question->answer = $val->validated('answer');
				$question->parent_id = $val->validated('parent_id');
				$question->topic_id = $val->validated('topic_id');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('question', $question, false);
		}

		$this->template->title = "Questions";
		$this->template->content = View::forge('question/edit');

	}

	public function action_delete($id = null)
	{
		if ($question = Model_Question::find($id))
		{
			$question->delete();

			Session::set_flash('success', 'Deleted question #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete question #'.$id);
		}

		Response::redirect('question');

	}


}