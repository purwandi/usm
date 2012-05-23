<?php echo render('report/nav-tabs');?>
<h1>Result</h1>
<hr>
<?php if ($data):?>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Fisrt Name</th>
			<th>Last Name</th>
			<th>Is Qualified</th>
			<th>Result</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;?>
		<?php foreach ($data as $d):?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $d->user_metadata->first_name;?></td>
			<td><?php echo $d->user_metadata->last_name;?></td>
			<td><?php echo Inflector::humanize($d->user_result->is_qualified,'-');?></td>
			<td><?php echo $d->user_result->result;?></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>

<?php endif;?>