# USM - Ujian Saringan Masuk Secara Oline

Merupakan perangkat lunak ujian saringan masuk online tugas akhir oleh purwandi di Universitas Mercu Buana.
Dalam pembuatan perangkat lunak ini, penulis dibimbing oleh Ibu Devi Fitrianah, S.Kom., MTI.

## Fitur

1. Lock Screen pada saat ujian berlangsung dengan menggunakan Fullscreen Api HTML5
2. Pada saat ujian berlangsung, soal dan jawaban dilakukan pengacakan
3. Passing Grade dapat ditentukan sendiri
4. Multiple user yang terdiri dari Kaprodi, TU, Dosen, dan Calon Mahasiswa Baru

## Instalasi

1. Buat Database
2. Modifikasi DB condig 'application/config/database.php', rubah setting host, username dan db

```
'mysql' => array(
		'driver'   => 'mysql',
		'host'     => 'localhost',
		'database' => 'fuelusm_dev',
		'username' => 'root',
		'password' => 'neki',
		'charset'  => 'utf8',
		'prefix'   => '',
	),
```

3. Pastikan PHP CLI anda akfif
4. Masuk ke direktori ini dan lakukan

```	
	// untuk melakukan install table migrasi
	php artisan migrate:install

	// lakukan instal table
	php artisan migrate
```

5. Username dan password kaprodi

```
	username = general@ui.com
	password = 222
```

6. Lakukan pengolahan data, karena yang ada baru data mentah

### Major components:

* [Laravel PHP Framework](http://www.laravel.com/)
* [jQuery](http://jquery.com)
* [Twitter Bootstrap](http://twitter.github.com/bootstrap/)
* [Jquery Fullscreen](https://github.com/martinaglv/jQuery-FullScreen)
* and many more ....

## License

MIT License

Copyright (c) <2012> <Purwandi> <pur@purwandi.com>

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.