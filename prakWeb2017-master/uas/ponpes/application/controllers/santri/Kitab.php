<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kitab extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('Loginauth');
		$this->loginauth->view_page();
		
		$this->load->model("admin/M_kitab",'mdl');
	}

	public function index()
	{	
		$this->load->view('attribute/header_santri');
		$this->load->view('santri/kitab');
		$this->load->view('attribute/footer');
	}
	public function update()
	{	
		$this->load->view('attribute/header_santri');
		$this->load->view('santri/update_kitab');
		$this->load->view('attribute/footer');
	}

	public function datatable(){
		$fetch_data = $this->mdl->make_datatables();
		
		
		$data = array();
		$nmr = 0;
		foreach($fetch_data as $row)
		{
			$nmr+=1;

			$sub_array = array();
			$sub_array[] = $nmr;
			$sub_array[] = $row->kode_pelajaran;
			$sub_array[] = $row->nama_pelajaran;
			$sub_array[] = $row->kitab;
			$sub_array[] = $row->grade;
			$data[] = $sub_array;
		}

		$output = array(
			"draw"            =>  intval($_POST["draw"]),
			"recordsTotal"    =>  $this->mdl->get_all_data(),
			"recordsFiltered" =>  $this->mdl->get_filtered_data(),
			"data"            =>  $data
			);
		echo json_encode($output);
	}

	public function delete_data($kode_pelajaran)
	{
		$this->mdl->delete_by_id($kode_pelajaran);
		echo json_encode(array("status" => TRUE));
	}
	public function tambah_kitab()
	{	
		

		$data['kode_pelajaran']	=$this->input->post('kode_pelajaran');
		$data['nama_pelajaran']	=$this->input->post('nama_pelajaran');
		$data['kitab']			=$this->input->post('kitab');
		$data['grade']			=$this->input->post('grade');
		
		$this->mdl->getInsert($data);
		$this->session->set_flashdata('info','Data Sukses di Simpan');
		redirect('santri/kitab');
		unset($data);
	}
	public function ubah_kitab($kode_pelajaran)
	{
		
		$data['data']= $this->mdl->data_kitab($kode_pelajaran)->row();

		$this->load->view('attribute/header_santri');
		$this->load->view('santri/update_kitab',$data);
		$this->load->view('attribute/footer');
		unset($data);
	}
	public function proses_ubah_kitab()
	{
		$data['nama_pelajaran']	=$this->input->post('nama_pelajaran');
		$data['kitab']			=$this->input->post('kitab');
		$data['grade']			=$this->input->post('grade');

		$kode_pelajaran			=$this->input->post('kode_pelajaran');

		$this->mdl->getUpdate($kode_pelajaran,$data);
		redirect('santri/kitab');
		unset($kode_pelajaran,$data);
	}
}
