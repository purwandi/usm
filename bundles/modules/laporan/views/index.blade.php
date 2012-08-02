@layout('layouts.main')
@section('title')
   Laporan
@endsection

@section('content')
	
	<legend>Laporan</legend>
	<div class="row">
		<div class="span3">
			<div class="well" style="max-width: 340px; padding: 8px 0;">
			    <ul class="nav nav-list">
			    @if ($grade)
			    	<li class="nav-header">Passing Grade</li>
			    	@foreach($grade as $p)
			    		@if (Input::get('grade') === $p->name)
			    			<li class="active">{{ HTML::link('laporan?grade='.$p->name.'&tanggal='.Input::get('tanggal'),$p->name) }}</li>
			    		@else
			    			<li>{{ HTML::link('laporan?grade='.$p->name.'&tanggal='.Input::get('tanggal'),$p->name) }}</li>
			    		@endif
				    @endforeach
				@endif
				</ul>
			</div>
		</div>
		<div class="span9">
			{{ Form::open('laporan','GET', array('class'=>'form-inline')) }}
				{{ Form::hidden('grade', Input::get('grade')) }}
				{{ Form::date('tanggal',Input::get('tanggal'),array('placeholder'=>'Pilih Tanggal')) }}
				{{ Form::button('Search', array('class'=>'btn','type'=>'submit')) }}
			{{ Form::close() }}

			@if($hasil['result'])
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Tanggal Lahir</th>
							<th>Jenjang Pendidikan</th>
							<th>Nilai</th>
							<th>Grade</th>
							<th>Waktu isi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;?>
						@foreach($hasil['result'] as $h)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $h->realname }}</td>
							<td>{{ $h->birthday }}</td>
							<td>{{ $h->name }}</td>
							<td>{{ $h->grade }}</td>
							<td>{{ $h->hasil }}</td>
							<td>{{ $h->waktu }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $hasil['mice'] }}
				{{ $hasil['links'] }}
			@else
				<div class="alert">Tidak ada data</div>
			@endif
		</div>
	</div>

@endsection