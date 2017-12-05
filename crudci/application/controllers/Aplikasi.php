<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		
		if ($this->session->userdata('userid') and $this->session->userdata('pass')) {
			$this->load->model('m_aplikasi');
		}else{
			redirect(base_url('login'));
		}
	}

	public function index(){
		$this->load->view('v_aplikasi');
	}

	public function tambah_mahasiswa(){
		$data['page'] ='tambah_mahasiswa';
		$this->load->view('v_aplikasi',$data);
		unset($data);
	}

	public function proses_tambah_mahasiswa(){
		$data['nim']=$this->input->post('nim');
		$data['nama']=$this->input->post('nama');

		$this->m_aplikasi->tambah_mahasiswa($data);

		redirect(base_url('Aplikasi/daftar_mahasiswa'));
		unset($data);
	}

	public function daftar_mahasiswa(){
		$data['page']='daftar_mahasiswa';

		//pencarian
		if (!empty($this->input->post('cari'))) {
			$cari = $this->input->post('cari');
			$data['cari'] = $cari;
			$data['daftar_mhs']=$this->m_aplikasi->cari_mahasiswa($cari)->result();
			$data['jumlah'] =  count($data['daftar_mhs']);
		}else{
			//mengambil semua fungsi baris (dgn fungsi result)
			//di model m_aplikasi function daftar mahasiswa
			$data['daftar_mhs']=$this->m_aplikasi->daftar_mahasiswa()->result();
			
		}
		
		$this->load->view('v_aplikasi',$data);
		unset($data);
	}

	public function ubah_mahasiswa($nim){
		$data['page']='ubah_mahasiswa';
		$data['mhs']=$this->m_aplikasi->data_mahasiswa($nim)->row();
		$this->load->view('v_aplikasi',$data);
		unset($data);		

	}

	public function proses_ubah_mahasiswa(){
		$data['nama']=$this->input->post('nama');
		$nim=$this->input->post('nim');

		$this->m_aplikasi->ubah_mahasiswa($nim,$data);

		redirect(base_url('Aplikasi/daftar_mahasiswa'));
		unset($nim,$data);	
	}

	public function hapus_mahasiswa($nim){
		$this->m_aplikasi->hapus_mahasiswa($nim);
		redirect(base_url('Aplikasi/daftar_mahasiswa'));
		
	}

	public function logout(){
		$this->m_aplikasi->putus_koneksi();

		$array_session=$this->session->all_userdata();
		$this->session->unset_userdata($array_session);
		unset($array_session);

		$this->session->sess_destroy();

		redirect(base_url('Login'));
	}
}

 ?>