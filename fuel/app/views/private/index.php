<div class="row">
	<div class="span6 offset3">
		<?php echo Form::open();?>
			<legend>Login Sistem</legend>
			<?php echo Form::text('Username or NIM','username');?>
			<?php echo Form::pass('Password','password');?>

			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Login sistem</button>
				<?php echo Html::anchor('group','Cancel',array('class'=>'btn'));?>
			</div>
		<?php echo Form::close();?>
	</div>
</div>