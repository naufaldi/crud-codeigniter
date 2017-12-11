<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	function db_cek_login($userid,$password)
	{
		$query = $this->db->query("select id_user,password,nama from user where id_user=? and password=md5(?)",array($userid,$password));
		return $query;
		$query=null;
		unset($userid,$password);
	}
}
