<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_aplikasi extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	function tambah_mahasiswa($data)
	{
		$this->db->query("insert into mahasiswa (nim,nama) values (?,?)",array($data['nim'],$data['nama']));
		unset($data);
	}
	function daftar_mahasiswa()
	{
		$query=$this->db->query('select nim,nama from mahasiswa order by nim asc');
		return $query;
		$query=null;
	}
	public function list_mahasiswa()
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$query=$this->db->get();
		return $query->result();
		$query=null;
	}
	function data_mahasiswa($nim)
	{
		$query=$this->db->query('select nim,nama from mahasiswa where nim=?',array($nim));
		return $query;
		$query=null;
		unset($nim);
	}
	function ubah_mahasiswa($nim,$data)
	{
		$this->db->query('update mahasiswa set nama=? where nim=?',array($data['nama'],$nim));
		unset($nim,$data);
	}
	function hapus_mahasiswa($nim)
	{
		$this->db->query('delete from mahasiswa where nim=?',array($nim));
		unset($nim);
	}
	function putus_koneksi()
	{
		$this->db=null;
	}
	function cari_mahasiswa($data)
	{
		$query=$this->db->query("select nim,nama from mahasiswa where nim like ? or nama like ? order by nim asc",array('%'.$data.'%','%'.$data.'%'));
		return $query;
		$query=null;
	}


}
