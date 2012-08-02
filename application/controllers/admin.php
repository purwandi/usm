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
class Admin_Controller extends Base_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->filter('before','auth');
	}

}