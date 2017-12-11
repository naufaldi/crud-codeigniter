<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();//untuk session
class Master_Transaksi_Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Loginauth');
        $this->loginauth->view_page();
        $this->load->model('admin/Model_Coba','model');
    }

    public function index()
    {
        $this->load->view('attribute/header_admin');
        $this->load->view('admin/perpus/master_transaksi_peminjaman');
        $this->load->view('attribute/footer');
    }

    public function ajax_tampil_data_siswa($NIS)
    {
       $data = $this->model->tampil_data_siswa($NIS);
        echo json_encode($data);
    }

    public function ajax_tampil_data_buku($idBuku)
    {
       $data = $this->model->tampil_data_buku($idBuku);
        echo json_encode($data);
    }

    public function ajax_list()
    {
        $list = $this->model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $model) {
            $no++;
            $row = array();
            $row[] = $model->NIS;
            $row[] = $model->nama_santri;
            $row[] = $model->alamat;
            $row[] = $model->idBuku;
            $row[] = $model->judulBuku;
            $row[] = $model->penerbitBuku;
            $row[] = $model->jumlahPinjam;
            $row[] = $model->tanggalPeminjaman;
            $row[] = $model->tanggalPengembalian;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$model->idPeminjaman."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$model->idPeminjaman."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
        
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

    public function ajax_edit($idPeminjaman)
    {
        $data = $this->model->get_by_id($idPeminjaman);
        echo json_encode($data);    
    }

    public function ajax_add()
    {
        // update data master buku
        $datapinjam = array(
                'jumlahBuku' => $this->input->post('jumlahBuku'),
            );
        $this->model->updatepaspinjam(array('idBuku' => $this->input->post('idBuku')), $datapinjam);
        // ==================

        $data = array(
                'NIS' => $this->input->post('NIS'),
                'idBuku' => $this->input->post('idBuku'),
                'jumlahPinjam' => $this->input->post('jumlahPinjam'),
                'tanggalPeminjaman' => $this->input->post('tanggalPeminjaman'),
                'tanggalPengembalian' => $this->input->post('tanggalPengembalian'),
            );
        $insert = $this->model->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_tampil_jumlah_buku($idBuku)
    {
       $data = $this->model->tampil_jumlah_buku($idBuku);

        echo json_encode($data);
    }

    public function ajax_update()
    {
        // update data master buku
        $datapinjam = array(
                'jumlahBuku' => $this->input->post('jumlahBuku'),
            );
        $this->model->updatepaspinjam(array('idBuku' => $this->input->post('idBuku')), $datapinjam);
        // ==================
        
        $data = array(
                'NIS' => $this->input->post('NIS'),
                'idBuku' => $this->input->post('idBuku'),
                'jumlahPinjam' => $this->input->post('jumlahPinjam'),
                'tanggalPeminjaman' => $this->input->post('tanggalPeminjaman'),
                'tanggalPengembalian' => $this->input->post('tanggalPengembalian'),
            );
        $this->model->update(array('idPeminjaman' => $this->input->post('idPeminjaman')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update_buku()
    {
        $data = array(
                'jumlahBuku' => $this->input->post('jumlahBuku'),
            );
        $this->model->updatepaspinjam(array('idBuku' => $this->input->post('idBuku')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($idPeminjaman)
    {
        $this->model->delete_by_id($idPeminjaman);
        echo json_encode(array("status" => TRUE));
    }

}