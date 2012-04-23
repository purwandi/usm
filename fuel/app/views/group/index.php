<div class="page-header">
    <h1>Groups <small>Manage groups</small></h1>
</div>
<div class="row">
	<div class="span4">
		&nbsp;
	</div>
	<div class="span8">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Groups Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>

		<?php if ($groups):?>
		<?php $n = 1;?>
			
			<?php foreach ($groups as $key):?>
			<tr>
				<td><?php echo $n++;?></td>
				<td><?php echo $key->name;?></td>
				<td><?php echo Html::anchor('group/update/'.$key->id,'<i class="icon icon-pencil"></i> Edit');?></td>
				<td><?php echo Html::anchor('group/delete/'.$key->id,'<i class="icon icon-trash"></i> Delete',array('onclick' => "return confirm('Are you sure?')"));?></td>
			</tr>
			<?php endforeach;?>

		<?php endif;?>
				
			</tbody>
		</table>
		<?php echo Html::anchor('group/create','Create',array('class'=>'btn btn-primary'));?>
	</div>
</div>
