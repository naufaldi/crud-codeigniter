<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class M_aplikasi extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function simpan($data){
		$this->db->query("INSERT INTO kalkulator(angka1, angka2, operator, hasil) VALUES(?,?,?,?)", array($data['angka1'],$data['angka2'],$data['operator'],$data['hasil']));
		unset($data);
	}
}