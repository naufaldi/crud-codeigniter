<?php defined('BASEPATH')OR exit('no direct script access allowed');
/**
 * 
 */
class LoginMod extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function actLogin($username, $password, $level)
	{	

		$query = $this->db->query("SELECT * FROM tb_akses WHERE username=? AND password=? AND idLevel=?", array($username, $password, $level));
 		if ($query) {
 			return $query;
 		}else{
 			return false;
 		}
 		$query =null;
 		unset($username, $password, $level);

	}

	public function putus_koneksi()
	{	
		$this->db = null;
	}
} ?>