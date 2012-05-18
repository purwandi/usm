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