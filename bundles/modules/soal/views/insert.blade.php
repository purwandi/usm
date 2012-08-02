@layout('layouts.main')
@section('title')
   Tambah Passing Grade
@endsection

@section('content')
	
	<legend>Tambah Passing Grade</legend>

	{{ Form::open() }}

	<div class="row">
		
		<div class="span6">
			{{ Form::btext('Nama passing grade','name') }}
			{{ Form::btext('Batas Atas','top') }}
			{{ Form::btext('Batas Bawah','bottom') }}
			<div class="form-actions">
				{{ Form::button('Tambah',array('class'=>'btn btn-primary')) }}
			</div>
		</div>
	</div>
	
	{{ Form::close() }}
	
@endsection