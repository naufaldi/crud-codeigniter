<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxcrud extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_ajaxcrud');
	}

	public function index(){
		$data['daftar_mhs'] = $this->daftar_mahasiswa();
		$this->load->view('v_ajaxcrud',$data);

		unset($data);
	}

	public function daftar_mahasiswa(){
		$data = $this->m_ajaxcrud->daftar_mahasiswa()->result();

		$no =1;
		$tampil = "<table class='table table-bordered'>
					<thead>
						<tr><th width='5%'><center>No</center></th>
							<th width='10%'><center>NIM</center></th>
							<th width='70%'><center>Nama</center></th>
							<th width='15%'><center>Aksi</center></th>
						</tr>
					<thead>";

		foreach ($data as $r) {
			$tampil .= "<tr><td><center>".$no."</center></td>
					<td><center>".$r->nim."</center></td>
					<td><a href='#' class='xedit' id='".$r->nim."' data-type='text' data-pk='1' data-tittle='Ubah Data'>".$r->nama."</a></td>
					<td><center><a href='javascript:void(0)' onClick='hapus(\"".$r->nim."\")'><i class='icon-remove'></i> Hapus</a><center></td>

					<tr/>";
					$no++;
		}

		$tampil .="</table><br/><br/><br/>";
		return $tampil;
		unset($data,$no,$tampil,$r);
	}

	public function tambah_mahasiswa(){
		$inputdata['nim'] = $this->input->post('nim2');
		$inputdata['nama'] = $this->input->post('nama2');

		$this->m_ajaxcrud->tambah_mahasiswa($inputdata);

		echo json_encode ($this->daftar_mahasiswa());

		unset($inputdata);
	}

	public function hapus_mahasiswa($nim){

		$this->m_ajaxcrud->hapus_mahasiswa($nim);

		echo json_encode ($this->daftar_mahasiswa());

		unset($nim);

	}

	public function ubah_mahasiswa(){
		$nim = $this->input->post('name');
		$data = $this->input->post('value');

		$this->m_ajaxcrud->ubah_mahasiswa($nim,$data);

		unset($nim,$data);
	}

}
 
