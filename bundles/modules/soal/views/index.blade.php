@layout('layouts.main')
@section('title')
   Passing Grade
@endsection

@section('content')
	
	<legend>Data Soal {{ $topik->name }}</legend>

	@if(isset($soal))
		
		<?php $arr = array();?>
		@foreach ($soal as $key) 
			
			<?php $arr[$key->parent_id][] = $key ?>
				
		@endforeach

		{{ Project::get_level($arr) }}

	@endif

	<a href="#modal" role="button" class="btn" data-toggle="modal">Tambah Soal</a>

	<div class="modal hide" id="modal">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h3>Soal</h3>
	    </div>
	    <div class="modal-body">
	    	<h4>Soal dalam bentuk cerita</h4>
	    	<p> Jenis soal ini terdiri dari sebuah cerita, dimana cerita yang dibuat akan memberikan keterangan atau
	    		informasi mengenai soal-soal yang dicakupnya. Soal-soal yang terdiri dari beberapa soal</p>
			<?php echo HTML::link('soal/insert/cerita', 'Tambah soal bentuk cerita'); ?>

			<hr>
			
			<h4>Soal dalam bentuk individu</h4>
			<p>Merupakan soal individu,</p>
			<?php echo HTML::link('soal/insert/individu', 'Tambah soal bentuk individu'); ?>
	    	
	    </div>
	    <div class="modal-footer">
	      <a href="#" class="btn" data-dismiss="modal" >Close</a>
	    </div>
	</div>

@endsection