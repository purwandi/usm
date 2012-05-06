<h2>Listing Educations</h2>
<br>
<?php if ($educations): ?>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($educations as $education): ?>		<tr>

			<td><?php echo $education->id; ?></td>
			<td><?php echo $education->name; ?></td>
			<td>
				<?php echo Html::anchor('education/update/'.$education->id, 'Update'); ?> |
				<?php echo Html::anchor('education/delete/'.$education->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Educations.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('education/create', 'Add new Education', array('class' => 'btn success')); ?>

</p>
