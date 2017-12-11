<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_PinjamDenda extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Loginauth');
        $this->loginauth->view_page();
        
        $this->load->model('admin/Model_Master_Pinjam_Dan_Denda','model');
    }

    public function index()
    {
        $this->load->view('attribute/header_admin');
        $this->load->view('admin/perpus/master_pinjam_dan_denda');
        $this->load->view('attribute/footer');
    }

    public function ajax_list()
    {
        $list = $this->model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $nomor = 0;
        foreach ($list as $model) {
            $nomor += 1;
            $row = array();
            $row[] = $nomor;
            $row[] = $model->kategori;
            $row[] = $model->waktuPinjam;
            $row[] = $model->denda;
            
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$model->idLamaPinjamDanDenda."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$model->idLamaPinjamDanDenda."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model->count_all(),
                        "recordsFiltered" => $this->model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($idLamaPinjamDanDenda)
    {
        $data = $this->model->get_by_id($idLamaPinjamDanDenda);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
                'jenisPeminjam' => $this->input->post('jenisPeminjam'),
                'waktuPinjam' => $this->input->post('waktuPinjam'),
                'denda' => $this->input->post('denda'),
            );
        $insert = $this->model->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $data = array(
                'jenisPeminjam' => $this->input->post('jenisPeminjam'),
                'waktuPinjam' => $this->input->post('waktuPinjam'),
                'denda' => $this->input->post('denda'),
            );
        $this->model->update(array('idLamaPinjamDanDenda' => $this->input->post('idLamaPinjamDanDenda')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($idLamaPinjamDanDenda)
    {
        $this->model->delete_by_id($idLamaPinjamDanDenda);
        echo json_encode(array("status" => TRUE));
    }

}
