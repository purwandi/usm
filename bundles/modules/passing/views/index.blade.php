@layout('layouts.main')
@section('title')
   Passing Grade
@endsection

@section('content')
	
	@if($passings)

	<table class="table">
		<thead>
			<tr>
				<th>Nama Passing Grade</th>
				<th>Batas Atas</th>
				<th>Batas Bawah</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>

			@foreach($passings['result'] as $u )
			
			<tr>
				<td>{{ HTML::link('passing/update/'.$u->id, $u->name) }}</td>
				<td>{{ $u->top }}</td>
				<td>{{ $u->bottom }}</td>
				<td>{{ HTML::link('passing/delete/'.$u->id, 'Hapus') }}</td>
			</tr>

			@endforeach

		</tbody>
	</table>
	
	<div class="row">
		<div class="span2">{{ $passings['mice'] }} &nbsp;</div>
		<div class="span8">{{ $passings['links'] }} &nbsp;</div>
		
	</div>
	
	@else

		<div class="alert">
			Data is empty
		</div>

	@endif
	{{ HTML::link('passing/insert','Tambah', array('class'=>'btn btn-primary')) }}

@endsection