<h1>Daily Report</h1>
<hr>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Date</th>
			<th>Qualified</th>
			<th>Not Qualified</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;?>
		<?php foreach($data as $d):?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $d->hari;?></td>
			<td><?php echo $d->qua.' '.Html::anchor('report/index/'.$d->hari.'/qualified','View Data');?></td>
			<td><?php echo $d->not_qua.' '.Html::anchor('report/index/'.$d->hari.'/not-qualified','View Data');?></td>
			<td><?php echo $d->total.' '.Html::anchor('report/index/'.$d->hari.'/all','View Data');?></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>