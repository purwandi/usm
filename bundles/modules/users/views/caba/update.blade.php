@layout('layouts.main')
@section('title')
   Update Calon Mahasiswa Baru
@endsection

@section('content')
	
	<legend>Update Calon Mahasiswa Baru</legend>

	{{ Form::open() }}

	<div class="row">
		<div class="alert alert-info">Password menggunakan tanggal lahir</div>
		
		<div class="span6">
			{{ Form::btext('Username','username', $user->username) }}
			{{ Form::bemail('Email','email', $user->email) }}
		</div>

		<div class="span6">
			{{ Form::btext('Nama asli','realname', $user->realname) }}
			{{ Form::bradio('Jenis Kelamin','gender', array('M'=>'M','F'=>'F'), $user->gender, array('inline'=> true )) }}
			{{ Form::bdate('Tanggal Lahir','birthday', $user->birthday) }}
			{{ Form::bselect('Pendidikan Terakhir','education_id', $jenjang, $user->education_id) }}
		</div>
	</div>
	<div class="form-actions">
			{{ Form::button('Simpan',array('class'=>'btn btn-primary')) }}
		</div>
	{{ Form::close() }}
	
@endsection