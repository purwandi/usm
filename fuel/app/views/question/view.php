<h2>Viewing #<?php echo $question->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $question->name; ?></p>
<p>
	<strong>Ops 1:</strong>
	<?php echo $question->ops_1; ?></p>
<p>
	<strong>Ops 2:</strong>
	<?php echo $question->ops_2; ?></p>
<p>
	<strong>Ops 3:</strong>
	<?php echo $question->ops_3; ?></p>
<p>
	<strong>Ops 4:</strong>
	<?php echo $question->ops_4; ?></p>
<p>
	<strong>Ops 5:</strong>
	<?php echo $question->ops_5; ?></p>
<p>
	<strong>Answer:</strong>
	<?php echo $question->answer; ?></p>
<p>
	<strong>Parent id:</strong>
	<?php echo $question->parent_id; ?></p>
<p>
	<strong>Topic id:</strong>
	<?php echo $question->topic_id; ?></p>

<?php echo Html::anchor('question/edit/'.$question->id, 'Edit'); ?> |
<?php echo Html::anchor('question', 'Back'); ?>