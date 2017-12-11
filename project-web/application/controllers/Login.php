<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username')){
            redirect(base_url('logistik'));
        }
        $this->load->model(array('M_login'));
    }
    function index()
    {
        $this->load->view('login');
    }
    function proses()
    {
        $this->form_validation->set_rules('username','username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','password','required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
          } else {
            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            $u = $usr;
            $p = md5($psw);
            $cek = $this->M_login->cek($u, $p);
            if ($cek->num_rows() > 0) {
              //login berhasil, buat session
              foreach ($cek->result() as $qad) {
                $sess_data['id_pengguna'] = $qad->id_pengguna;
                $sess_data['nama_pengguna'] = $qad->nama_pengguna;
                $sess_data['username'] = $qad->username;
                $sess_data['level'] = $qad->level;
                $this->session->set_userdata($sess_data);
              }
              $this->session->set_flashdata('success', 'Login Berhasil !');
              redirect(base_url('index.php/logistik/index'));
            } else {
              $this->session->set_flashdata('result_login', '
      Username atau Password yang anda masukkan salah.');
              redirect(base_url('index.php/login'));
            }
          }
    }
}