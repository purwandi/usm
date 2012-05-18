<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::textarea('name', Input::post('name', isset($question) ? $question->name : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Ops 1', 'ops_1'); ?>

			<div class="input">
				<?php echo Form::textarea('ops_1', Input::post('ops_1', isset($question) ? $question->ops_1 : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Ops 2', 'ops_2'); ?>

			<div class="input">
				<?php echo Form::textarea('ops_2', Input::post('ops_2', isset($question) ? $question->ops_2 : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Ops 3', 'ops_3'); ?>

			<div class="input">
				<?php echo Form::textarea('ops_3', Input::post('ops_3', isset($question) ? $question->ops_3 : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Ops 4', 'ops_4'); ?>

			<div class="input">
				<?php echo Form::textarea('ops_4', Input::post('ops_4', isset($question) ? $question->ops_4 : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Ops 5', 'ops_5'); ?>

			<div class="input">
				<?php echo Form::textarea('ops_5', Input::post('ops_5', isset($question) ? $question->ops_5 : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Answer', 'answer'); ?>

			<div class="input">
				<?php echo Form::input('answer', Input::post('answer', isset($question) ? $question->answer : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Parent id', 'parent_id'); ?>

			<div class="input">
				<?php echo Form::input('parent_id', Input::post('parent_id', isset($question) ? $question->parent_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Topic id', 'topic_id'); ?>

			<div class="input">
				<?php echo Form::input('topic_id', Input::post('topic_id', isset($question) ? $question->topic_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>