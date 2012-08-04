# USM

Merupakan perangkat lunak ujian saringan masuk online yang merupakan tugas akhir
skripsi di Universitas Mercu Buana

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