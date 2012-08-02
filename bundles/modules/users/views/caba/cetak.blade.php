@layout('layouts.main')
@section('title')
   Calon Mahasiswa Baru
@endsection

@section('content')
<div class="row">
	<div class="span6">

		<table class="table">
			<thead>
				<tr>
					<th colspan="2">Biodata Diri</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Nama asli</td>
					<td>{{ $user->realname }}</td>
				</tr>
				<tr>
					<td>Username</td>
					<td>{{ $user->email }}</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>{{ $user->birthday }}</td>
				</tr>
				<tr>
					<td>Jenjang Pendidikan</td>
					<td>{{ $user->education->name }}</td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>{{ $user->birthday }}</td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>{{ ($user->sex == 'M' ? 'Male' : 'Female') }}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="span6">
		<a href="http://usm.local/" onclick="window.print(); return false" class="btn btn-large"><i class="icon icon-print"></i> Cetak halaman ini</a>
	</div>
</div>
@endsection