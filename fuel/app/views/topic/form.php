<h1>Topik</h1>
<hr />

<?php echo Form::open(); ?>
	<?php echo Form::text('Nama topik','name', @$topic->name);?>
	<?php echo Form::text('Waktu habis','time_limit', @$topic->time_limit);?>
	<div class="form-actions">
	    <button type="submit" class="btn btn-primary">Save changes</button>
	    <?php echo Html::anchor($module,'Cancel',array('class'=>'btn'));?>
	</div>
<?php echo Form::close(); ?>