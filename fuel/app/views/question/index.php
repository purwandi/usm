<h2>Listing Questions for Topic <?php echo $topic->name;?></h2>
<br>

<?php if (isset($topic->question)):

	$arr = array();
	foreach ($topic->question as $key) 
	{
		$arr[$key->parent_id][] = $key;
	}

	echo Project::get_level($arr);

endif;?>

<p>
	<a data-toggle="modal" href="#tipe" class="btn btn-primary">Add Question</a>
</p>


<div id="tipe" class="modal hide fade">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h3>Modal Heading</h3>
    </div>
    <div class="modal-body">
    	<h4>Soal dalam bentuk cerita</h4>
    	<p> Jenis soal ini terdiri dari sebuah cerita, dimana cerita yang dibuat akan memberikan keterangan atau
    		informasi mengenai soal-soal yang dicakupnya. Soal-soal yang terdiri dari beberapa soal</p>
		<?php echo Html::anchor('question/create/'.Uri::segment(3).'?mode=cerita', 'Add new Question'); ?>

		<hr>
		
		<h4>Soal dalam bentuk individu</h4>
		<p>Bukan merupakan soal cerita,</p>
		<?php echo Html::anchor('question/create/'.Uri::segment(3).'?mode=individu', 'Add new Question'); ?>
    	
    </div>
    <div class="modal-footer">
      <a href="#" class="btn" data-dismiss="modal" >Close</a>
    </div>
 </div>

 <!--
			<th>Ops 1</th>
			<th>Ops 2</th>
			<th>Ops 3</th>
			<th>Ops 4</th>
			<th>Ops 5</th>
			<th>Answer</th>
			<th>Parent id</th>
			<th>Topic id</th>
			<th></th>
		<tr>
			<td><?php echo Str::decode_html($question->name); ?></td>
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
	-->