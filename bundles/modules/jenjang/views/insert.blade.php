@layout('layouts.main')
@section('title')
   Tambah Jenjang
@endsection

@section('content')
	
	<legend>Tambah Jenjang</legend>

	{{ Form::open() }}

	<div class="row">
		
		<div class="span6">
			{{ Form::btext('Nama jenjang','name') }}
			<div class="form-actions">
				{{ Form::button('Tambah',array('class'=>'btn btn-primary')) }}
			</div>
		</div>
	</div>
	
	{{ Form::close() }}
	
@endsection