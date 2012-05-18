<h1>Pilih salah satu topic</h1>
<hr />

<?php if ($topics):?>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Topic Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;?>
		<?php foreach ($topics as $t):?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $t->topic->name;?></td>
				<td><?php echo Html::anchor('caba/mulai/'.$t->topic->id,'Mulai');?></td>
			</tr>
		<?php endforeach;?>
		
	</tbody>
</table>
<?php else:?>
<?php endif;?>