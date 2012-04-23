
<div class="row">
	<div class="span4">
		&nbsp;
	</div>
	<div class="span8">

<?php echo Form::error();?>

		<?php echo Form::open(array('class'=>'form-horizontal'));?>
			<?php echo Form::fieldset_open('','Form groups name');?>
			<?php echo Form::text('Groups name','name',@$data->name);?>

			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Save changes</button>
				<?php echo Html::anchor('group','Cancel',array('class'=>'btn'));?>
			</div>
			<?php echo Form::fieldset_close();?>
		<?php echo Form::close();?>
	</div>
</div>
