<h1>Please select topic first</h1>
<hr />
<?php if(isset($topics)):?>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Topic Name</th>
			<th>Number of questions</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = 1 ;?>
	<?php foreach($topics as $topic):?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo Html::anchor('question/index/'.$topic->id,$topic->name);?></td>
			<td><?php echo count($topic->question);?></td>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>
<?php endif;?>