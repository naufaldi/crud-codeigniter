<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class AjaxModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function tambah_mahasiswa($data){
		$this->db->query("INSERT ignore into mahasiswa (nim, nama) values (?,?)", array($data['nim'], $data['nama']));
		unset($data);
	}

	public function daftar_mahasiswa(){
		$query = $this->db->query("SELECT nim, nama FROM mahasiswa order by nim asc");
		return $query;
		$query = null;
	}

	// public function cari_mahasiswa($data){
	// 	$query = $this->db->query("SELECT nim, nama FROM mahasiswa where nim like ? or nama like ? order by nim asc", array('%'.$data.'%', '%'.$data.'%'));
	// 	return $query;
	// 	$query = null;
	// }

	public function data_mahasiswa($nim){
		$query = $this->db->query("SELECT nim, nama FROM mahasiswa where nim = ?", array($nim));
		return $query;
		$query = null;
		unset($nim);
	}

	public function ubah_mahasiswa($nim, $data){
		$this->db->query("UPDATE mahasiswa set nama=? where nim = ?", array($data['nama'], $nim));
		unset($nim, $data);
	}

	public function hapus_mahasiswa($nim){
		$this->db->query("DELETE from mahasiswa where nim=?", array($nim));
		unset($nim);
	}

	public function putus_koneksi(){
		$this->db = null;
		
	}
	
}