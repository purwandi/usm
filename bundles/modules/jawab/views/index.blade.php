<div class="container">
	<br /><br /><br />
	<div class="row">
		<div class="span9">
			<div class="alert"><strong>Silahkan jawab pertanyaan di bawah ini</strong></div>
		</div>
		<div class="span3">
			<div class="alert alert-info">
				<h4>Waktu tersisa  </h4>
				<div id="countdown"></div>
			</div>
		</div>
	</div>
	
	{{ Form::open('',null, array('id'=>'frm-jawab')) }}
	{{ Form::token() }}
	<div id="frm-target"></div>
	@foreach($topik as $t)
		<legend>{{ $t->topik->name }}</legend>

		<?php $arr = array();?>
		@foreach($t->topik->soaldata as $s)
			
			<?php $arr[$s->parent_id][] = $s ;?>

		@endforeach

		<?php $data = Project::get_acak($arr) ?>

		{{ $data['html'] }}
		
	@endforeach
		
		<div class="form-actions">
    		<button type="submit" class="btn btn-primary">Save changes</button>
    		<button type="button" class="btn" id="btn-Close">Selesai</button>
    	</div>

	{{ Form::close() }}
</div>