<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('userid') and $this->session->userdata('pass')) {
			$this->load->model('M_aplikasi');
		}else{
			redirect(base_url('login'));
		}
	}


	public function index()
	{
		$this->load->view('v_aplikasi');
	}
	public function tambah_mahasiswa()
	{
		$data['page']='Tambah Mahasiswa';
		$this->load->view('v_aplikasi',$data);
		unset($data);
	}
	public function proses_tambah_mahasiswa()
	{
		$data['nim']=$this->input->post('nim');
		$data['nama']=$this->input->post('nama');

		$this->M_aplikasi->tambah_mahasiswa($data);
		redirect(base_url('Aplikasi/daftar_mahasiswa'));
		unset($data);
	}
	public function daftar_mahasiswa()
	{
		$data['page']='Daftar Mahasiswa';
		//pencarian
		if (!empty($this->input->post('cari'))) {
			$cari				= $this->input->post('cari');
			$data['cari']		= $cari;
			$data['daftar_mhs']	= $this->M_aplikasi->cari_mahasiswa($cari)->result();
			$data['jumlah']		= count($data['daftar_mhs']);
		}else{
			$data['daftar_mhs']= $this->M_aplikasi->daftar_mahasiswa()->result();
		}
		
		$this->load->view('v_aplikasi',$data);
		unset($data,$cari);
	}

	public function ubah_mahasiswa($nim)
	{
		$data['page']='Ubah Mahasiswa';
		$data['mhs']= $this->M_aplikasi->data_mahasiswa($nim)->row();
		$this->load->view('v_aplikasi',$data);
		unset($data);
	}
	public function proses_ubah_mahasiswa()
	{
		$data['nama']=$this->input->post('nama');
		$nim=$this->input->post('nim');
		$this->M_aplikasi->ubah_mahasiswa($nim,$data);
		redirect(base_url('Aplikasi/daftar_mahasiswa'));
		unset($nim,$data);
	}
	public function hapus_mahasiswa($nim)
	{
		$this->M_aplikasi->hapus_mahasiswa($nim);	
		redirect(base_url('Aplikasi/daftar_mahasiswa'));
	}
	public function logout()
	{
		$this->M_aplikasi->putus_koneksi();
		$array_sess = $this->session->all_userdata();
		$this->session->unset_userdata($array_sess);
		unset($array_sess);
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}
