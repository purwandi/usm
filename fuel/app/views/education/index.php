<h2>Listing Educations</h2>
<br>
<?php if ($educations): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($educations as $education): ?>		<tr>

			<td><?php echo $education->name; ?></td>
			<td>
				<?php echo Html::anchor('education/view/'.$education->id, 'View'); ?> |
				<?php echo Html::anchor('education/edit/'.$education->id, 'Edit'); ?> |
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
