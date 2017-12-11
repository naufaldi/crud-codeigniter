<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_biodata', 'bio');
	}

	public function index()
	{
		$data['mhs']=$this->bio->get_mhs();
		$this->load->view('daftar_mhs', $data);
	}

	public function tambah()
	{
		$this->load->view('tambah_mhs');
	}

	public function addMhs()
	{
		$data['nim'] = $this->input->post('nim');
		$data['nama'] = $this->input->post('nama');
		$data['tempat_lahir'] = $this->input->post('tempatLahir');
		$data['tgl_lahir'] = $this->input->post('tanggalLahir');
		$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
		$data['alamat'] = $this->input->post('alamat');

		$this->bio->simpan($data);
		redirect('Biodata');

	}


	
}
