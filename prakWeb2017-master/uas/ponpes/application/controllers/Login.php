<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('Loginauth');
		$this->loginauth->view_page();
		$this->load->library('Recaptcha');
	}

	public function index()
	{	
		if ($this->session->userdata('username') and 
			$this->session->userdata('password') and
			$this->session->userdata('level'))
		{	
			redirect('FunctLogin/prosesLogin',$data);
		} else
		{	
			$data =array(
			'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag() // javascript recaptcha ditaruh di head
            );
			$this->load->view('v_login',$data);
		}
	}
	public function dashboard()
	{
		$this->load->view('attribute/header_admin');
		$this->load->view('admin/dashboard');
		$this->load->view('attribute/footer');
	}
}
