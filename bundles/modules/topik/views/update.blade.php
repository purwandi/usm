@layout('layouts.main')
@section('title')
   Update Topik
@endsection

@section('content')
	
	<legend>Update Topik</legend>

	{{ Form::open() }}

	<div class="row">
		
		<div class="span6">
			{{ Form::btext('Nama topik','name', $topik->name) }}
			{{ Form::btext('Waktu yang diberikan (menit)','given_time', $topik->given_time) }}
			<div class="form-actions">
				{{ Form::button('Simpan',array('class'=>'btn btn-primary')) }}
			</div>
		</div>
	</div>
	
	{{ Form::close() }}
	
@endsection