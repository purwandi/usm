@layout('layouts.main')
@section('title')
   Tambah Ketua Program Studi
@endsection

@section('content')
	
	<legend>Tambah Ketua Program Studi</legend>

	{{ Form::open() }}

	<div class="row">
		

		<div class="span6">
			{{ Form::btext('Username','username') }}
			{{ Form::bemail('Email','email') }}
			{{ Form::bpassword('Password','password') }}
		</div>

		<div class="span6">
			{{ Form::btext('Nama asli','realname') }}
			{{ Form::bradio('Jenis Kelamin','gender', array('M'=>'M','F'=>'F'), 'M', array('inline'=> true )) }}
			{{ Form::bdate('Tanggal Lahir','birthday') }}
		</div>
	</div>
	<div class="form-actions">
			{{ Form::button('Tambah',array('class'=>'btn btn-primary')) }}
		</div>
	{{ Form::close() }}
	
@endsection