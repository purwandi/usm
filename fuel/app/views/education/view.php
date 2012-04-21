<h2>Viewing #<?php echo $education->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $education->name; ?></p>

<?php echo Html::anchor('education/edit/'.$education->id, 'Edit'); ?> |
<?php echo Html::anchor('education', 'Back'); ?>