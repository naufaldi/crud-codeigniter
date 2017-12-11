<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class M_biodata extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function simpan($data){
		$this->db->query("INSERT INTO biodata(nim, nama, tempat_lahir, tgl_lahir, jenis_kelamin, alamat) VALUES(?,?,?,?,?,?)", array($data['nim'],$data['nama'],$data['tempat_lahir'],$data['tgl_lahir'],$data['jenis_kelamin'],$data['alamat']));
		unset($data);
	}

	public function get_mhs(){
		$query = $this->db->query("select * from biodata");
		return $query->result_array();
		$query->free_result();

	}
}