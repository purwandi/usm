<div class="container">
	<h3>Ujian Saringan Masuk {{ Config::get('system.universitas.name')}} </h3>
    <p>{{ Config::get('system.fakultas.name')}}</p>
    <div class="subnav">
		<ul class="nav nav-pills">
			@if ( ! Auth::guest())
                {{-- Kaprodi --}}
                @if(Auth::user()->role_id == 'kaprodi')

                    <li>{{ HTML::link('','Dashboard') }} </li>
                    <li>{{ HTML::link('', "Selamat Datang ".Auth::user()->realname) }} </li>
                    <li> {{ HTML::link('kaprodi','Kaprodi') }} </li>
                    <li> {{ HTML::link('tatausaha','Tata Usaha') }} </li>
                    <li> {{ HTML::link('dosen','Dosen') }}</li>
                    <li> {{ HTML::link('passing','Passing Grade') }} </li>

                {{-- Tata Usaha --}}
                @elseif(Auth::user()->role_id == 'tatausaha')

                    <li>{{ HTML::link('','Dashboard') }} </li>
                    <li>{{ HTML::link('', "Selamat Datang ".Auth::user()->realname) }} </li>
                    <li> {{ HTML::link('topik','Topik') }} </li>
                    <li> {{ HTML::link('jenjang','Jenjang Pendidikan') }}</li>
                    <li> {{ HTML::link('caba','Calon Mahasiswa') }}</li>
                    <li> {{ HTML::link('laporan','Laporan') }} </li>

                {{-- Dosen --}}
                @elseif(Auth::user()->role_id == 'dosen')

                    <li>{{ HTML::link('','Dashboard') }} </li>
                    <li>{{ HTML::link('', "Selamat Datang ".Auth::user()->realname) }} </li>
                    <li> {{ HTML::link('soal','Data Soal') }} </li>

                @else
                
                    <li>{{ HTML::link('', "Selamat Datang ".Auth::user()->realname) }} </li>
                    <li>{{ HTML::link('hasil','Hasil') }} </li>

                @endif
                
                <li>{{ HTML::link('logout','Log Out') }}</li>
            @endif
        </ul>
    </div><!-- /navbar-inner -->
</div><!-- /navbar -->