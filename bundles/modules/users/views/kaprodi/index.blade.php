@layout('layouts.main')
@section('title')
   Ketua Program Studi
@endsection

@section('content')
	
	@if($users)

	<table class="table">
		<thead>
			<tr>
				<th>Username</th>
				<th>Jenis Kelamin</th>
				<th>Tanggal Lahir</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>

			@foreach($users['result'] as $u )
			
			<tr>
				<td>{{ HTML::link('kaprodi/update/'.$u->id, $u->realname) }}</td>
				<td>{{ $u->gender }}</td>
				<td>{{ $u->birthday }}</td>
				<td>{{ HTML::link('kaprodi/delete/'.$u->id, 'Hapus') }}</td>
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

	{{ HTML::link('kaprodi/insert','Tambah', array('class'=>'btn btn-primary')) }}

@endsection