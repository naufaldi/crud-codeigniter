<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_aplikasi extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function simpan($data)
	{
		$this->db->query("INSERT INTO kalkulator (angka1,angka2,operator,hasil) values (?,?,?,?)",array($data['angka1'],$data['angka2'],$data['pilih_hitung'],$data['hasil_hitung']));

		unset($data);
	}
	public function simpan_mhs($data)
	{
		$this->db->query("INSERT INTO mhs (nim,nama,tempat,tgl,jk,alamat) values (?,?,?,?,?,?)",array($data['nim'],$data['nama'],$data['tempat'],$data['tgl'],$data['jk'],$data['alamat']));
		
		unset($data);
	}
}
?>
