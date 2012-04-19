<h2>Editing Topic</h2>
<br>

<?php echo render('topic/_form'); ?>
<p>
	<?php echo Html::anchor('topic/view/'.$topic->id, 'View'); ?> |
	<?php echo Html::anchor('topic', 'Back'); ?></p>
