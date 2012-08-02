@layout('layouts.main')
@section('title')
   Update Passing Grade
@endsection

@section('content')
	
	<legend>Update Passing Grade</legend>

	{{ Form::open() }}

	<div class="row">
		
		<div class="span6">
			{{ Form::btext('Nama passing grade','name', $passings->name) }}
			{{ Form::btext('Batas Atas','top', $passings->top) }}
			{{ Form::btext('Batas Bawah','bottom', $passings->bottom) }}
			<div class="form-actions">
				{{ Form::button('Simpan',array('class'=>'btn btn-primary')) }}
			</div>
		</div>
	</div>
	
	{{ Form::close() }}
	
@endsection