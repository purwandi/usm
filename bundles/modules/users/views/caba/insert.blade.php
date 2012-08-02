@layout('layouts.main')
@section('title')
   Tambah Calon Mahasiswa Baru
@endsection

@section('content')
	
	<legend>Tambah Calon Mahasiswa Baru</legend>

	{{ Form::open() }}

	<div class="row">
		<div class="alert alert-info">Password menggunakan tanggal lahir</div>

		<div class="span6">
			{{ Form::btext('Username','username') }}
			{{ Form::bemail('Email','email') }}
		</div>

		<div class="span6">
			{{ Form::btext('Nama asli','realname') }}
			{{ Form::bradio('Jenis Kelamin','gender', array('M'=>'M','F'=>'F'), 'M', array('inline'=> true )) }}
			{{ Form::bdate('Tanggal Lahir','birthday') }}
			{{ Form::bselect('Pendidikan Terakhir','education_id', $jenjang) }}
		</div>
	</div>
	<div class="form-actions">
			{{ Form::button('Tambah',array('class'=>'btn btn-primary')) }}
		</div>
	{{ Form::close() }}
	
@endsection