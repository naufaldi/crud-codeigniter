<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kitab extends CI_Model{

  var $table = "tb_kitab";
  var $select_column = array("tb_kitab.kode_pelajaran", "tb_kitab.nama_pelajaran","tb_kitab.kitab","tb_kitab.grade");

  var $order_column = array("tb_kitab.kode_pelajaran", "tb_kitab.nama_pelajaran","tb_kitab.kitab","tb_kitab.grade");

  var $column_order = array("tb_kitab.kode_pelajaran", "tb_kitab.nama_pelajaran","tb_kitab.kitab","tb_kitab.grade",null);

  var $column_search = array("tb_kitab.kode_pelajaran", "tb_kitab.nama_pelajaran","tb_kitab.kitab","tb_kitab.grade");

  var $order = array('tb_kitab.kode_pelajaran' => 'desc');

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
  public function delete_by_id($kode_pelajaran){
    $this->db->where('kode_pelajaran', $kode_pelajaran);
    $this->db->delete($this->table);
  }
  public function getInsert($data){
    $this->db->query("insert into tb_kitab (kode_pelajaran,nama_pelajaran,kitab,grade) values (?,?,?,?)",array($data['kode_pelajaran'],$data['nama_pelajaran'],$data['kitab'],$data['grade']));
    unset($data);
  }
  function data_kitab($kode_pelajaran){
    $query=$this->db->query('select kode_pelajaran,nama_pelajaran,kitab,grade from tb_kitab where kode_pelajaran=?',array($kode_pelajaran));
    return $query;
    $query=null;
    unset($kode_pelajaran);
  }
  function getUpdate($kode_pelajaran,$data){
    $this->db->query('update tb_kitab set nama_pelajaran= ?,kitab= ?,grade= ? where kode_pelajaran=?',array($data['nama_pelajaran'],$data['kitab'],$data['grade'],$kode_pelajaran));
    unset($kode_pelajaran,$data);
  }
}
