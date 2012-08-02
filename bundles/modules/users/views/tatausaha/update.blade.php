@layout('layouts.main')
@section('title')
   Update Tata Usaha
@endsection

@section('content')
	
	<legend>Update Tata Usaha</legend>

	{{ Form::open() }}

	<div class="row">
		

		<div class="span6">
			{{ Form::btext('Username','username', $user->username) }}
			{{ Form::bemail('Email','email', $user->email) }}
			{{ Form::bpassword('Password','password') }}
		</div>

		<div class="span6">
			{{ Form::btext('Nama asli','realname', $user->realname) }}
			{{ Form::bradio('Jenis Kelamin','gender', array('M'=>'M','F'=>'F'), $user->gender, array('inline'=> true )) }}
			{{ Form::bdate('Tanggal Lahir','birthday', $user->birthday) }}
		</div>
	</div>
	<div class="form-actions">
			{{ Form::button('Simpan',array('class'=>'btn btn-primary')) }}
		</div>
	{{ Form::close() }}
	
@endsection