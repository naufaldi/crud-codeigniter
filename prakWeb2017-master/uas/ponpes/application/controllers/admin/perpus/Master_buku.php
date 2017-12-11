<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Loginauth');
        $this->loginauth->view_page();
        $this->load->model('admin/Model_Master_Buku','model');
    }

    public function index()
    {
        $this->load->view('attribute/header_admin');
        $this->load->view('admin/perpus/master_buku');
        $this->load->view('attribute/footer');
    }

    public function ajax_list()
    {
        $list = $this->model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $nmr=0;
        foreach ($list as $model) {
            // $no++;
            $nmr+=1;
            $row = array();
            // $row[] = $nmr;
            $row[] = $model->judulBuku;
            $row[] = $model->waktuMasuk;
            $row[] = $model->jumlahBuku;
            $row[] = $model->penulisBuku;
            $row[] = $model->tahunCetakBuku;
            $row[] = $model->penerbitBuku;
            $row[] = $model->kotaPenerbitBuku;

            //add html for action
            $row[] = '
            <a class="btn btn-sm btn-primary button-demo js-modal-buttons" href="javascript:void()" title="Edit" onclick="edit_person('."'".$model->idBuku."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
            <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$model->idBuku."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

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

    public function ajax_edit($idBuku)
    {
        $data = $this->model->get_by_id($idBuku);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
            'judulBuku' => $this->input->post('judulBuku'),
            'waktuMasuk' => $this->input->post('waktuMasuk'),
            'jumlahBuku' => $this->input->post('jumlahBuku'),
            'penulisBuku' => $this->input->post('penulisBuku'),
            'tahunCetakBuku' => $this->input->post('tahunCetakBuku'),
            'penerbitBuku' => $this->input->post('penerbitBuku'),
            'kotaPenerbitBuku' => $this->input->post('kotaPenerbitBuku'),
            );
        $insert = $this->model->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $data = array(
            'judulBuku' => $this->input->post('judulBuku'),
            'waktuMasuk' => $this->input->post('waktuMasuk'),
            'jumlahBuku' => $this->input->post('jumlahBuku'),
            'penulisBuku' => $this->input->post('penulisBuku'),
            'tahunCetakBuku' => $this->input->post('tahunCetakBuku'),
            'penerbitBuku' => $this->input->post('penerbitBuku'),
            'kotaPenerbitBuku' => $this->input->post('kotaPenerbitBuku'),
            );
        $this->model->update(array('idBuku' => $this->input->post('idBuku')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($idBuku)
    {
        $this->model->delete_by_id($idBuku);
        echo json_encode(array("status" => TRUE));
    }

}
