<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_santri extends CI_Model{

  var $table = "tb_santri";
  var $select_column = array("tb_santri.NIS", "tb_santri.nama_santri","tb_santri.gender","tb_santri.status_aktif","tb_santri.nama_wali","tb_santri.alamat","tb_santri.tgl_masuk","tb_santri.kamar","tb_santri.tmp_lahir","tb_santri.tgl_lahir");
  var $order_column = array("tb_santri.NIS", "tb_santri.nama_santri","tb_santri.gender","tb_santri.status_aktif","tb_santri.nama_wali","tb_santri.alamat","tb_santri.tgl_masuk","tb_santri.kamar","tb_santri.tmp_lahir","tb_santri.tgl_lahir");

  var $column_order = array("tb_santri.NIS", "tb_santri.nama_santri","tb_santri.gender","tb_santri.status_aktif","tb_santri.nama_wali","tb_santri.alamat","tb_santri.tgl_masuk","tb_santri.kamar","tb_santri.tmp_lahir","tb_santri.tgl_lahir",null);

  var $column_search = array("tb_santri.NIS", "tb_santri.nama_santri","tb_santri.gender","tb_santri.status_aktif","tb_santri.nama_wali","tb_santri.alamat","tb_santri.tgl_masuk","tb_santri.kamar","tb_santri.tmp_lahir","tb_santri.tgl_lahir");

  var $order = array('tb_santri.NIS' => 'desc');

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
  public function delete_by_id($NIS){
    $this->db->where('NIS', $NIS);
    $this->db->delete($this->table);
  }
  public function getInsert($data){
    $this->db->query("insert into tb_santri (NIS,nama_santri,gender,status_aktif,nama_wali,alamat,tgl_masuk,kamar,tmp_lahir,tgl_lahir) values (?,?,?,?,?,?,?,?,?,?)",array($data['NIS'],$data['nama_santri'],$data['gender'],$data['status_aktif'],$data['nama_wali'],$data['alamat'],$data['tgl_masuk'],$data['kamar'],$data['tmp_lahir'],$data['tgl_lahir']));
    unset($data);
  }
  function data_santri($NIS){
    $query=$this->db->query('select NIS,nama_santri,gender,status_aktif,nama_wali,alamat,tgl_masuk,kamar,tmp_lahir,tgl_lahir from tb_santri where NIS=?',array($NIS));
    return $query;
    $query=null;
    unset($NIS);
  }
  function getUpdate($NIS,$data){
    $this->db->query('update tb_santri set nama_santri= ?,gender= ?,status_aktif= ?,nama_wali= ?,alamat= ?,tgl_masuk= ?,kamar= ?,tmp_lahir= ?,tgl_lahir= ? where NIS=?',array($data['nama_santri'],$data['gender'],$data['status_aktif'],$data['nama_wali'],$data['alamat'],$data['tgl_masuk'],$data['kamar'],$data['tmp_lahir'],$data['tgl_lahir'],$NIS));
    unset($NIS,$data);
  }
}
