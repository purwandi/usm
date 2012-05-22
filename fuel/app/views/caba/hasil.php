<h1>Hasil Ujian</h1>
<hr />
<?php if ($topics):?>
<table class="table">
	<thead>
		<tr>
			<th class="span1">#</th>
			<th>Topik</th>
			<th>Skor</th>
		</tr>
	<tbody>
		<?php $no = 1; $sum = 0;?>
		<?php foreach($topics as $t):?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $t->topic->name;?></td>
			<td><?php echo $t->result;?></td>
			<?php $sum += $t->result;?>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>HASIL </th>
			<th>NILAI </th>
		</tr>
		<tr>
			<th><?php echo Inflector::humanize($result->is_qualified);?></th>
			<th><?php echo $result->result;?></th>
		</tr>
	</thead>
</table>
<?php endif;?>