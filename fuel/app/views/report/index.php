<h1>Daily Report</h1>
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
			<td><?php echo $d->first_name;?></td>
			<td><?php echo $d->last_name;?></td>
			<td><?php echo Inflector::humanize($d->is_qualified,'-');?></td>
			<td><?php echo $d->result;?></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>

<?php endif;?>