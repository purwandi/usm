<h1>Education</h1>
<hr />

<?php echo Form::open(); ?>
	<?php echo Form::text('Name','name',@$education->name);?>
	<div class="form-actions">
	    <button type="submit" class="btn btn-primary">Save changes</button>
	    <?php echo Html::anchor($module,'Cancel',array('class'=>'btn'));?>
	</div>
<?php echo Form::close(); ?>