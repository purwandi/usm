<h2>Editing Education</h2>
<br>

<?php echo render('education/_form'); ?>
<p>
	<?php echo Html::anchor('education/view/'.$education->id, 'View'); ?> |
	<?php echo Html::anchor('education', 'Back'); ?></p>
