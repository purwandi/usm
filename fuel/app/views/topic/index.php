<h2>Listing Topics</h2>
<br>
<?php if ($topics): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Time limit</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($topics as $topic): ?>		
		<tr>
			<td><?php echo $topic->id; ?></td>
			<td><?php echo $topic->name; ?></td>
			<td><?php echo $topic->time_limit; ?></td>
			<td>
				<?php echo Html::anchor('topic/view/'.$topic->id, 'View'); ?> |
				<?php echo Html::anchor('topic/edit/'.$topic->id, 'Edit'); ?> |
				<?php echo Html::anchor('topic/delete/'.$topic->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Topics.</p>

<?php endif; ?>
<p>
	<?php echo Html::anchor('topic/create', 'Add new Topic', array('class' => 'btn btn-success')); ?>
</p>