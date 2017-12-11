<?php defined('BASEPATH')OR exit('tidak ada akses di izinkan');
/**
 *
 */
class FunctLogin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('LoginMod', 'mod');
		$this->load->library('Recaptcha');
	}

	public function filter($data)
	{	$data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
	return $data; 
	unset($data);
}

public function index()
{	
	$data =array(
			'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag() // javascript recaptcha ditaruh di head
            );
	$this->load->view('v_login',$data);
}
public function logout()
{
	$this->mod->putus_koneksi();
	$array_sess	= $this->session->all_userdata();

	$this->session->unset_userdata($array_sess);
	unset($array_sess);
	$this->session->sess_destroy();

	redirect('login');
}

public function prosesLogin()
{
	$username = $this->input->post('username');
	$username = $this->filter($username);

	$password= $this->input->post('password');
	$password= md5($password);
	$password = $this->filter($password);

	$level = $this->input->post('level');

	$recaptcha = $this->input->post('g-recaptcha-response');
	$response = $this->recaptcha->verifyResponse($recaptcha);


	$prosesLog = $this->mod->actLogin($username, $password, $level)->row();
	$result = count($prosesLog);
	
	if(isset($response['success']) && $response['success'] == true){
		if ($result>0) {
			if ($username==$prosesLog->username) {
				if ($password==$prosesLog->password) {
					if ($prosesLog->idLevel==1) {
						$data = array(
							'id'		=>$prosesLog->id,
							"username"	=>$prosesLog->username,
							"pass" 		=>$prosesLog->password,
							"level"		=>$prosesLog->idLevel);
						$this->session->set_userdata($data);
						redirect('admin/C_admin');
					}else if($prosesLog->idLevel==2){
						$data = array(
							'id'		=>$prosesLog->id,
							"username"	=>$prosesLog->username,
							"pass" 		=>$prosesLog->password,
							"level"		=>$prosesLog->idLevel);
						$this->session->set_userdata($data);
						redirect('ustadz/C_ustadz');
					}else if($prosesLog->idLevel==3){
						$data = array(
							'id'		=>$prosesLog->id,
							"username"	=>$prosesLog->username,
							"pass" 		=>$prosesLog->password,
							"level"		=>$prosesLog->idLevel);
						$this->session->set_userdata($data);
						redirect('santri/C_santri');
					}else{
						$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\">Level tidak terpenuhi</div>");
						redirect('functLogin');
					}
				}else{
					$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\">Password salah</div>");
					redirect('functLogin');
				}
			}else{
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\">Username tidak tepat</div>");
				redirect('functLogin');	
			}
		}else{
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\">Data anda tidak terdaftar dalam sistem</div>");
			redirect('functLogin');
		}
	}else{
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\">Klik Recaptcha</div>");
		redirect('functLogin');	
	}

}
}
?>