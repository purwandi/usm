@layout('layouts.main')
@section('title')
   Calon Mahasiswa Baru
@endsection

@section('content')
	
	@if($users)

	<table class="table">
		<thead>
			<tr>
				<th>Username</th>
				<th>Jenis Kelamin</th>
				<th>Tanggal Lahir</th>
				<th>Jenjang Pendidikan</th>
				<th>Delete</th>
				<th>Print</th>
			</tr>
		</thead>
		<tbody>

			@foreach($users['result'] as $u )
			
			<tr>
				<td>{{ HTML::link('caba/update/'.$u->id, $u->realname) }}</td>
				<td>{{ $u->gender }}</td>
				<td>{{ $u->birthday }}</td>
				<td>{{ $u->education->name }}</td>
				<td>{{ HTML::link('caba/delete/'.$u->id, 'Hapus') }}</td>
				<td>{{ HTML::link('caba/cetak/'.$u->id,'Cetak', array('target'=>'_blank')) }}</td>
			</tr>

			@endforeach

		</tbody>
	</table>
	
	<div class="row">
		<div class="span2">{{ $users['mice'] }} &nbsp;</div>
		<div class="span8">{{ $users['links'] }} &nbsp;</div>
	</div>
	
	

	@else

		<div class="alert">
			Data is empty
		</div>

	@endif

	{{ HTML::link('caba/insert','Tambah', array('class'=>'btn btn-primary')) }}

@endsection