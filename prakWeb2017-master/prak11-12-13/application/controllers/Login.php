<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}
	public function index()
	{
		if ($this->session->userdata('userid') and $this->session->userdata('pass')) {
			redirect (base_url('aplikasi'));
		}else{
			$this->load->view('v_login');	
		}

	}
	public function filter($data)
	{
		$data=preg_replace('/[^a-zA-z0-9]/', '', $data);
		return $data;
		unset($data);
	}
	public function ceklogin()
	{
		$userid =$this->input->post('userid');
		$userid = $this->filter($userid);
		$password =$this->input->post('password');
		$password = $this->filter($password);

		$cek = $this->M_login->db_cek_login($userid,$password)->row();
		$jumlah = count($cek);
		if ($jumlah>0) {
			$array_session= array(
				'userid' => $cek->id_user,
				'pass' => $cek->password,
				'nama' => $cek->nama,
				'sukses_login' => true
				);
			$this->session->set_userdata($array_session);
			redirect(base_url('aplikasi'));
		}else{
			redirect(base_url('login/login_gagal'));
		}
		unset($userid,$password,$cek,$jumlah,$array_session);
	}
	public function login_gagal()
	{
		$data['gagal']='Anda Gagal Login';
		$this->load->view('v_login',$data);
	}
}
