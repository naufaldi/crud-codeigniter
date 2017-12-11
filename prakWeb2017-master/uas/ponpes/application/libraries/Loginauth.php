<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginauth{

  // public $favicon = 'assets/template/img/favicon.png';

  protected $ci;

  public function __construct()
  {
    $this->ci =& get_instance();
  }

  public function view_page()
  {
    if($this->ci->session->userdata('level')=='1'){
      $url =  explode("/",$_SERVER["REQUEST_URI"]);
      if ($url[2]!="admin") {
        redirect('admin/C_admin');
      }
    }elseif ($this->ci->session->userdata('level')=='2') {
      $url =  explode("/",$_SERVER["REQUEST_URI"]);
      if ($url[2]!="ustadz") {
        redirect('ustadz/C_ustadz');
      }
    }elseif ($this->ci->session->userdata('level')=='3') {
      $url =  explode("/",$_SERVER["REQUEST_URI"]);
      if ($url[2]!="santri") {
        redirect('santri/C_santri');
      }
    }else{
      $url =  $_SERVER["REQUEST_URI"];
      if ($url!='/ponpes/Login') {
        redirect('Login');
      }
    }
  }

}
?>
