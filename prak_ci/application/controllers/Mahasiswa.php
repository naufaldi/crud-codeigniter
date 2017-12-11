<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('userid') and $this->session->userdata('pass')) {

		$this->load->model('m_mahasiswa', 'mhs');	
		}else{
			redirect('Login');
		}
		
	}

	public function index()
	{
		$this->load->view('v_mahasiswa');
	}

	public function tambah_mahasiswa(){
		$data['page'] = 'tambah_mahasiswa';
		$this->load->view('v_mahasiswa', $data);
		unset($data);
	}

	public function proses_tambah_mahasiswa(){
		$data['nim'] = $this->input->post('nim');
		$data['nama'] = $this->input->post('nama');
		$this->mhs->tambah_mahasiswa($data);
		redirect('mahasiswa/daftar_mahasiswa');
		unset($data);
	}

	public function daftar_mahasiswa(){
		$data['page'] = 'daftar_mahasiswa';

		if(!empty($this->input->post('cari'))){
			$cari = $this->input->post('cari');
			$data['cari'] = $cari;
			$data['daftar_mhs'] = $this->mhs->cari_mahasiswa($cari)->result();
			$data['jumlah'] = count($data['daftar_mhs']);
		}else{
			$data['daftar_mhs'] = $this->mhs->daftar_mahasiswa()->result();	
		}
		
		$this->load->view('v_mahasiswa', $data);
		unset($data, $cari);
	}

	public function ubah_mahasiswa($nim){
		$data['page']='ubah_mahasiswa';
		$data['mhs'] = $this->mhs->data_mahasiswa($nim)->row();
		$this->load->view('v_mahasiswa', $data);
		unset($data);
	}

	public function proses_ubah_mahasiswa(){
		$data['nama'] = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$this->mhs->ubah_mahasiswa($nim, $data);
		redirect('mahasiswa/daftar_mahasiswa');
		unset($nim, $data);
	}

	public function hapus_mahasiswa($nim){
		$this->mhs->hapus_mahasiswa($nim);
		redirect('mahasiswa/daftar_mahasiswa');
	}

	public function logout(){
		$this->mhs->putus_koneksi();
		$array_session = $this->session->all_userdata();
		$this->session->unset_userdata($array_session);
		unset($array_session);

		$this->session->sess_destroy();
		redirect('login');
	}
	


	
}
