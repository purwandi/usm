<?php
/**
 * Ujian Saringan Masuk
 *
 * @package  USM
 * @version  1.0.0
 * @author   Purwandi <pur@purwandi.me>
 * @license  MIT License
 * @link     http://purwandi.me
 */
return array(
	// kaprodi
	'kaprodi' => array(
		'home' => array(),
		'kaprodi' => array('index','insert','update','delete'),
		'tatausaha' => array('index','insert','update','delete'),
		'dosen' => array('index','insert','update','delete'),
		'passing' => array('index','insert','update','delete')
	),
	// tata usaha
	'tatausaha' => array(
		'home' => array(),
		'topik' => array('index','insert','update','delete'),
		'jenjang' => array('index','insert','update','delete'),
		'jenjangtopik' => array(''),
		'caba' => array('index','insert','update','delete','cetak'),
		'laporan' => array('')
	),
	// dosen
	'dosen' => array(
		'home' => array(),
		'soal' => array('index','insert','update','delete')
	),
	// calon mahasiswa baru
	'caba' => array(
		'jawab' => array(),
		'hasil' => array()
	),
	'guest' => array(
		'' => array('index'),
		'login' => array('index')
	)
);