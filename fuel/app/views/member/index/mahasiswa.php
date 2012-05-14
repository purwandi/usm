<?php echo render('member/nav-tabs');?>
<h1>Mahasiswa</h1>

<?php if (Session::get_flash('success')): ?>
	<div class="alert alert-success">
		<button class="close" data-dismiss="alert">&times;</button>
		<?php echo Session::get_flash('success'); ?>
	</div>
<?php endif; ?>

<?php if ($member):?>

<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Topik</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($member as $m):?>
		<tr>
			<td><?php echo $m->id;?></td>
			<td><?php echo $m->username;?></td>
			<td><?php echo $m->user_metadata->first_name;?></td>
			<td><?php echo $m->user_metadata->last_name;?></td>
			<td><?php echo $m->user_metadata->education->name;?></td>
			<td><?php echo Html::anchor($module.'/update/'.Uri::segment(3).'/'.$m->id,'Update');?></td>
			<td><?php echo Html::anchor($module.'/delete/'.Uri::segment(3).'/'.$m->id,'Delete');?></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
<?php echo $pagination;?>
<?php endif;?>