<?php echo render('member/nav-tabs');?>
<h1>Mahasiswa</h1>
<hr />
<?php if (Session::get_flash('wrong')): ?>
	<div class="alert">
		<button class="close" data-dismiss="alert">&times;</button>
		<?php echo Session::get_flash('wrong'); ?>
	</div>
<?php endif; ?>

<?php echo Form::open(array('class'=>''));?>
	<div class="row">
		<div class="span4">
			<?php echo Form::text('Username','username',@$member->username);?>
			<?php echo Form::text('Email','email',@$member->email);?>
			<?php echo Form::pass('Password','password');?>
			<?php echo Form::pass('Confirm password','confirm_password');?>
			
		</div>
		<div class="span4">
			<?php echo Form::text('First name','first_name',@$member->user_metadata->first_name);?>
			<?php echo Form::text('Last name','last_name',@$member->user_metadata->last_name);?>
			<?php echo Form::drop('Gender','gender',@$member->user_metadata->gender,array(''=>'Select gender','Laki-Laki'=>'Laki-Laki','Perempuan'=>'Perempuan'));?>
			<?php echo Form::text('Dob','dob',@$member->user_metadata->dob);?>
			<?php echo Form::text('Palce dob','place_dob',@$member->user_metadata->place_dob);?>

		</div>
		<div class="span4">
			<?php echo Form::drop('Last education','education_id',@$member->user_metadata->education_id,$education);?>
		</div>
	</div>
	<div class="form-actions">
	    <button type="submit" class="btn btn-primary">Save changes</button>
	    <button class="btn">Cancel</button>
	</div>
</form>