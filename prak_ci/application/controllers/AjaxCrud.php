<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxCrud extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_mahasiswa', 'modelAjax');
	}

	public function index()
	{
		$data['daftar_mhs'] = $this->daftar_mahasiswa();
		$this->load->view('v_ajaxcrud', $data);
		unset($data);
	}

	public function daftar_mahasiswa(){
		$data = $this->modelAjax->daftar_mahasiswa()->result();
		$no = 1;
		$tampil = "<table class='table table-bordered'>
			<thead>
			<tr>
				<th width=5%'><center>No</center></th>
				<th width='10%'><center>NIM</center></th>
								<th width='70%'><center>Nama</center></th>
				<th width='15%'><center>Aksi</center></th><tr/></thead>
			";
			foreach ($data as $r) {
				$tampil .= "<tr>
				<td><center>".$no."</center></td>
				<td><center>".$r->nim."</center></td>
				<td><a href='#' class='xedit' id='".$r->nim."' data-type='text' data-pk='1' data-title='Ubah Data'>".$r->nama."</a></td>
				<td><center><a href='javascript:void(0)' onclick='hapus(\"".$r->nim."\")'><i class='glyphicon glyphicon-trash'></i>Hapus</a></center></td><tr/>";
				$no++;
			}
			$tampil .= "</table><br/><br/><br/>";
			return $tampil;
			unset($data, $no, $tampil, $r);
	}

	public function tambah_mahasiswa(){
		$inputdata['nim'] = $this->input->post('nim2');
		$inputdata['nama'] = $this->input->post('nama2');
		$this->modelAjax->tambah_mahasiswa($inputdata);
		echo json_encode($this->daftar_mahasiswa());
		unset($inputdata);
	}

	public function ubah_mahasiswa(){
		$nim = $this->input->post('name');
		$data['nama'] = $this->input->post('value');

		$this->modelAjax->ubah_mahasiswa($nim, $data);
		unset($nim, $data);
	}

	public function hapus_mahasiswa($nim){

		$this->modelAjax->hapus_mahasiswa($nim);
		echo json_encode($this->daftar_mahasiswa());
		unset($nim);
	}

	
}
