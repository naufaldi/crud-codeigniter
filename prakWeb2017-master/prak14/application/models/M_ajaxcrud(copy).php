<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ajaxcrud extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	function tambah_mahasiswa($data)
	{
		$this->db->query("insert ignore into mahasiswa (nim,nama) values (?,?)",array($data['nim'],$data['nama']));
		unset($data);
	}
	function daftar_mahasiswa()
	{
		$query=$this->db->query('select nim,nama from mahasiswa order by nim asc');
		return $query;
		$query=null;
	}
	function ubah_mahasiswa($nim,$data)
	{
		$this->db->query('update mahasiswa set nama=? where nim=?',array($nim,$data));
		unset($nim,$data);
	}
	function hapus_mahasiswaa($nim)
	{
		$this->db->query('delete from mahasiswa where nim = ?',array($nim));
		unset($nim);
	}
	function putus_koneksi()
	{
		$this->db=null;
	}


}
