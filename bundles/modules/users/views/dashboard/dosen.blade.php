@layout('layouts.main')
@section('title')
   Dashboard
@endsection

@section('content')
<div class="row">
	<div class="span6">
		<legend>Selamat Datang, {{ $auth->realname }}</legend>

		<table class="table">
			<thead>
				<tr>
					<th colspan="2">Biodata Diri</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Nama asli</td>
					<td>{{ $auth->realname }}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>{{ $auth->email }}</td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>{{ $auth->birthday }}</td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>{{ ($auth->sex == 'M' ? 'Male' : 'Female') }}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="span6">
		
	</div>
</div>
@endsection