<h2>Listing Questions</h2>
<br>
<?php if ($questions): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Ops 1</th>
			<th>Ops 2</th>
			<th>Ops 3</th>
			<th>Ops 4</th>
			<th>Ops 5</th>
			<th>Answer</th>
			<th>Parent id</th>
			<th>Topic id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($questions as $question): ?>		<tr>

			<td><?php echo $question->name; ?></td>
			<td><?php echo $question->ops_1; ?></td>
			<td><?php echo $question->ops_2; ?></td>
			<td><?php echo $question->ops_3; ?></td>
			<td><?php echo $question->ops_4; ?></td>
			<td><?php echo $question->ops_5; ?></td>
			<td><?php echo $question->answer; ?></td>
			<td><?php echo $question->parent_id; ?></td>
			<td><?php echo $question->topic_id; ?></td>
			<td>
				<?php echo Html::anchor('question/view/'.$question->id, 'View'); ?> |
				<?php echo Html::anchor('question/edit/'.$question->id, 'Edit'); ?> |
				<?php echo Html::anchor('question/delete/'.$question->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Questions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('question/create', 'Add new Question', array('class' => 'btn success')); ?>

</p>
