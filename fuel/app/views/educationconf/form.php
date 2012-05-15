<h1>Grant level education for topic</h1>
<hr />
<?php if (isset($data)):?>

<?php echo Form::open();?>

	<table class="table">
		<caption>Level of education <?php echo $data->name;?></caption>
		<thead>
			<tr>
				<th>#</th>
				<th>Topic Name</th>
				<th>Check</th>
			</tr>
		</thead>
		<tbody>
		<?php if ($topic):?>
			<?php $no = 1 ;?>
			<?php foreach ($topic as $t):?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $t->name;?></td>
				<td><?php echo Form::checkbox('topic_id['.$t->id.']','1',array('checked'=>@$arr[$t->id]));?></td>
			</tr>
			<?php endforeach;?>
		<?php endif;?>
		</tbody>
	</table>

	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Save changes</button>
		<button class="btn">Cancel</button>
	</div>
<?php echo Form::close();?>
<?php endif;?>