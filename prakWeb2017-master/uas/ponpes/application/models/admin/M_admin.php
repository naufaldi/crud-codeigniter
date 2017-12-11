<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model{

  var $table = "tb_ustadz";
  var $select_column = array("tb_ustadz.kode_ustadz", "tb_ustadz.nama_ustadz","tb_ustadz.gender","tb_ustadz.status_aktif","tb_ustadz.alamat","tb_ustadz.tgl_lahir","tb_ustadz.no_telp");

  var $order_column = array("tb_ustadz.kode_ustadz", "tb_ustadz.nama_ustadz","tb_ustadz.gender","tb_ustadz.status_aktif","tb_ustadz.alamat","tb_ustadz.tgl_lahir","tb_ustadz.no_telp");

  var $column_order = array("tb_ustadz.kode_ustadz", "tb_ustadz.nama_ustadz","tb_ustadz.gender","tb_ustadz.status_aktif","tb_ustadz.alamat","tb_ustadz.tgl_lahir","tb_ustadz.no_telp",null);

  var $column_search = array("tb_ustadz.kode_ustadz", "tb_ustadz.nama_ustadz","tb_ustadz.gender","tb_ustadz.status_aktif","tb_ustadz.alamat","tb_ustadz.tgl_lahir","tb_ustadz.no_telp");

  var $order = array('tb_ustadz.kode_ustadz' => 'desc');

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  function make_query() {
    $this->db->select($this->select_column);
    $this->db->from($this->table);

    $i = 0;

    foreach ($this->column_search as $item) 
    {
      if ($_POST['search']['value']) 
      {

        if ($i === 0) 
        {
          $this->db->group_start(); 
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if (count($this->column_search) - 1 == $i) 
          $this->db->group_end(); 
      }
      $i++;
    }

    if (isset($_POST['order'])) 
    {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function make_datatables(){
    $this->make_query();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();

  }

  function get_filtered_data(){
    $this->make_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  function get_all_data(){
    $this->db->select("*");
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }


  public function get_by_id($id){
    $this->db->from($this->table);
    $this->db->where('id', $id);
    $query = $this->db->get();

    return $query->row();
  }
  public function delete_by_id($kode_ustadz){
    $this->db->where('kode_ustadz', $kode_ustadz);
    $this->db->delete($this->table);
  }
  public function getInsert($data){
    $this->db->query("insert into tb_ustadz (kode_ustadz,nama_ustadz,gender,status_aktif,alamat,tgl_lahir,no_telp) values (?,?,?,?,?,?,?)",array($data['kode_ustadz'],$data['nama_ustadz'],$data['gender'],$data['status_aktif'],$data['alamat'],$data['tgl_lahir'],$data['no_telp']));
    unset($data);
  }
  function data_ustadz($kode_ustadz){
    $query=$this->db->query('select kode_ustadz,nama_ustadz,gender,status_aktif,alamat,tgl_lahir,no_telp from tb_ustadz where kode_ustadz=?',array($kode_ustadz));
    return $query;
    $query=null;
    unset($kode_ustadz);
  }
  function getUpdate($kode_ustadz,$data){
    $this->db->query('update tb_ustadz set nama_ustadz= ?,gender= ?,status_aktif= ?,alamat= ?,tgl_lahir= ?,no_telp= ? where kode_ustadz=?',array($data['nama_ustadz'],$data['gender'],$data['status_aktif'],$data['alamat'],$data['tgl_lahir'],$data['no_telp'],$kode_ustadz));
    unset($kode_ustadz,$data);
  }
}
