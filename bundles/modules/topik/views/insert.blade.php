@layout('layouts.main')
@section('title')
   Tambah Topik
@endsection

@section('content')
	
	<legend>Tambah Topik</legend>

	{{ Form::open() }}

	<div class="row">
		
		<div class="span6">
			{{ Form::btext('Nama topik','name') }}
			{{ Form::btext('Waktu yang diberikan (menit)','given_time') }}
			<div class="form-actions">
				{{ Form::button('Tambah',array('class'=>'btn btn-primary')) }}
			</div>
		</div>
	</div>
	
	{{ Form::close() }}
	
@endsection