@layout('layouts.main')
@section('title')
   Topik
@endsection

@section('content')
	
	@if($topik)

	<table class="table">
		<thead>
			<tr>
				<th>Nama Topik</th>
				<th>Batas Waktu</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>

			@foreach($topik['result'] as $u )
			
			<tr>
				<td>{{ HTML::link('topik/update/'.$u->id, $u->name) }}</td>
				<td>{{ $u->given_time }} menit</td>
				<td>{{ HTML::link('topik/delete/'.$u->id, 'Hapus') }}</td>
			</tr>

			@endforeach

		</tbody>
	</table>
	
	<div class="row">
		<div class="span2">{{ $topik['mice'] }} &nbsp;</div>
		<div class="span8">{{ $topik['links'] }} &nbsp;</div>
		
	</div>
	
	@else

		<div class="alert">
			Data is empty
		</div>

	@endif
	{{ HTML::link('topik/insert','Tambah', array('class'=>'btn btn-primary')) }}

@endsection