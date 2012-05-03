<?php 
$tabs_data = array(
	'administrator'	=> 'Administrator',
	'tata-usaha' => 'Tata Usaha',
	'dosen' => 'Dosen',
	'mahasiswa' => 'Mahasiswa'
);
?>
<ul class="nav nav-tabs">
	<?php foreach ($tabs_data as $key => $value) :?>
	  	<?php if (Uri::segment(3) == $key):?>
	  	<li class="active"><?php echo Html::anchor('member/index/'.$key,$value);?></li>
	  	<?php else:?>
	  	<li><?php echo Html::anchor('member/index/'.$key,$value);?></li>
	  	<?php endif;?>
	<?php endforeach;?>
</ul>

<div class="pull-right">
	<form>
		 <div class="control-group">
	        <div class="controls">
	          <div class="input-append">
	           	<input class="span3" id="appendedInputButton" size="16" placeholder="Search" type="text"><button class="btn" type="button"><i class="icon icon-search"></i></button>
	            <?php echo Html::anchor('member/create/'.Uri::segment(3),'New Member',array('class'=>'btn'));?>
	          </div>
	        </div>
	      </div>
	</form>
</div>