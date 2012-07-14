<div class="page-header">
	<h1>Soal Ujian Saringan Masuk</h1>
</div>
<div id="content" class="hide">
	<div class="container">
		<div class="pull-right">
			<div id="countdown"></div>
		</div>
		<div class="page-header">
			<h1>Soal Ujian Saringan Masuk</h1>
		</div>
		<div id="target"></div>
		<?php if ($topics):?>
			<?php echo Form::open(array('id'=>'frm-question'));?>
			<?php foreach($topics as $t):?>
				<legend><?php echo $t->topic->name;?></legend>

				<?php

					$topic = Model_Topic::find($t->topic->id,array(
							'related' => array(
								'question' => array(
									'order_by' => array('parent_id' => 'asc')
								)
							),
						));

				?>
				<?php if (isset($topic->question)):

					$arr = $data = $new = $last = array();
					$no = 1;

					// simpan data topic ke variabel sementara $arr
					// simpan id soal ke variabel data
					foreach ($topic->question as $key) 
					{
						$arr[$key->id] = $key;
						$data[$key->id] = $key->id;
					}

					// membuat nilai random id no soal
					// simpan di variabel $rand
					$rand = Project::random_key($data);

					// loop var rand dan cocokan dengan id $arr
					// 
					foreach ($rand as $key) 
					{
						$new[$key] = $arr[$key];
					}

					// asign data
					foreach ($new as $key) 
					{
						if ($key->mode !== 'cerita')
						{
							$last[$key->parent_id][] = $key;
						}
						else
						{
							$last[$key->parent_id][] = $key;
						}
						
					}

					$data = Project::get_acak($last, $jawab);
					echo $data['html'];
				endif;?>

			<?php endforeach;?>
			<?php
				echo '<div class="form-actions">
					   <button type="submit" class="btn btn-primary">Simpan Jawaban</button>
					   <button type="button" id="btn-close" class="btn btn-danger">Selesai</button>
				</div>';
				echo Form::close();
			?>
		<?php else:?>
		<?php endif;?>
	</div>
</div>

<button id="btn-request" class="btn btn-large">Full Screen</button>

<?php echo Asset::js('jquery.fullscreen.js');?>
<?php echo Asset::js('jquery.form.js');?>
<?php echo Asset::js('global.js');?>

<script>
	$(document).ready(function(){
		App.init();
	});

</script>