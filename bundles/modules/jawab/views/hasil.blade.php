@layout('layouts.main')
@section('title')
   Hasil
@endsection

@section('content')
	
	@if($topik)
		<legend>Hasil</legend>
		<div class="row">
			<div class="span3">
				<p>Grade </p>
				<h1>{{ $hasil->grade }}</h1>
				<p>Hasil Ujian</p>
				<h1>{{ $hasil->hasil }}</h1>
				
			</div>
			<div class="span9">
				<table class="table table-stripped">
					<thead>
						<tr>
							<th>Nama Topik</th>
							<th>Nilai</th>
						</tr>
					</thead>
					<tbody>
						@foreach($topik as $t)
						<tr>
							<td>{{ $t->name }}</td>
							<td>{{ $t->hasil }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@else
		<div class="alert">Anda belum mengisi :)</div>
	@endif
@endsection