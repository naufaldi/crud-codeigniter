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
        $this->load->model(array(M_login));
    }
}