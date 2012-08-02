@layout('layouts.main')
@section('title')
   Jenjang
@endsection

@section('content')
	
	@if($jenjang)

	<table class="table">
		<thead>
			<tr>
				<th>Nama Topik</th>
				<th>Jenjang Topik</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>

			@foreach($jenjang['result'] as $u )
			
			<tr>
				<td>{{ HTML::link('jenjang/update/'.$u->id, $u->name) }}</td>
				<td>{{ HTML::link('jenjangtopik/'.$u->id, 'Jenjang Topik') }}</td>
				<td>{{ HTML::link('jenjang/delete/'.$u->id, 'Hapus') }}</td>
			</tr>

			@endforeach

		</tbody>
	</table>
	
	<div class="row">
		<div class="span2">{{ $jenjang['mice'] }} &nbsp;</div>
		<div class="span8">{{ $jenjang['links'] }} &nbsp;</div>
		
	</div>
	
	@else

		<div class="alert">
			Data is empty
		</div>

	@endif
	{{ HTML::link('jenjang/insert','Tambah', array('class'=>'btn btn-primary')) }}

@endsection