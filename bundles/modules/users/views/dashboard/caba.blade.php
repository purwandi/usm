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
		<div class="alert">
			<strong>Petunjuk Pengisian, harap di baca !!! </strong>
		</div>
		<p>Sebelum memulai mengerjakan soal-soal ujian, anda di wajibkan membaca ketentuan sebagai berikut:</p>
		<ol>
			<li>Anda hanya diberikan satu kali saja untuk menjawab pertanyaan</li>
			<li>Sistem ini dilengkapi dengan lock screen, selama anda menjawab soal ujian maka layar akan terkunci dan hanya menampilkan soal saja</li>
			<li>Apabila anda meninggalkan layar ketika waktu berjalan maupun melakukan kecurangan dengan membuka window baru, maka ketika anda membuka halaman menjawab soal sudah tidak bisa </li>
			<li>Jika waktu yang telah berjalan telah habis, maka sistem akan melakukan penyimpanan secara otomatis</li>
			<li>Waktu dihitung ketika anda mengklik tombol mulai di bawah ini</li>
		</ol>
		<hr />
		<div class="control-group">
			<label class="control-label" for="term"></label>
			<div class="controls">
				<label class="checkbox ">
					<input id="chkterm" type="checkbox" name="term" value="yes"> Ya, saya telah membaca peringatan dan telah mengerti
				</label>
			</div>
		</div>
		<hr />
		<button class="btn btn-success btn-large" id="btn-mulai">Mulai ujian sekarang</button>
	</div>
</div>

<div id="fullscreen"></div>

@endsection

@section('js')
	@parent
	{{ HTML::script('js/jquery.form.js') }}
	{{ HTML::script('js/jquery.fullscreen.js') }}
	{{ HTML::script('js/countdown.js') }}
	{{ HTML::script('js/app.js') }}
	<script>
		$(document).ready(function(){
			App.init();
		})
	</script>
@endsection