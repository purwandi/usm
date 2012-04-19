<h2>Viewing #<?php echo $topic->id; ?></h2>

<p>
	<strong>Id:</strong>
	<?php echo $topic->id; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $topic->name; ?></p>
<p>
	<strong>Time limit:</strong>
	<?php echo $topic->time_limit; ?></p>

<?php echo Html::anchor('topic/edit/'.$topic->id, 'Edit'); ?> |
<?php echo Html::anchor('topic', 'Back'); ?>