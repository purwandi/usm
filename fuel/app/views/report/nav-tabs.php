<?php 
$tabs_data = array(
	'qualified'	=> 'Qualified',
	'not-qualified' => 'Not Qualified'
);
?>
<ul class="nav nav-tabs">
	<?php foreach ($tabs_data as $key => $value) :?>
	  	<?php if (Uri::segment(3) == $key):?>
	  	<li class="active"><?php echo Html::anchor('report/result/'.$key,$value);?></li>
	  	<?php else:?>
	  	<li><?php echo Html::anchor('report/result/'.$key,$value);?></li>
	  	<?php endif;?>
	<?php endforeach;?>
</ul>

<div class="pull-right">
	<?php echo Form::open(array('method'=>'get'));?>
		 <div class="control-group">
	        <div class="controls">
	          <div class="input-append">
	           	<input class="span3" name="search" id="appendedInputButton" size="16" value ="<?php echo Input::get('search');?>" placeholder="Search" type="text"><button class="btn" type="submit"><i class="icon icon-search"></i></button>
	          </div>
	        </div>
	      </div>
	<?php echo Form::close();?>
</div>