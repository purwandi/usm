@layout('layouts.main')
@section('title')
   Update Jenjang
@endsection

@section('content')
	
	<legend>Update Jenjang</legend>

	{{ Form::open() }}

	<div class="row">
		
		<div class="span6">
			{{ Form::btext('Nama jenjang','name', $jenjang->name) }}
			<div class="form-actions">
				{{ Form::button('Simpan',array('class'=>'btn btn-primary')) }}
			</div>
		</div>
	</div>
	
	{{ Form::close() }}
	
@endsection