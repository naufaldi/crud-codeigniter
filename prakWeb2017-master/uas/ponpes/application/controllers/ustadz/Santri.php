<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('Loginauth');
		$this->loginauth->view_page();
		$this->load->model("admin/M_santri",'mdl');
	}

	public function index()
	{	
		$this->load->view('attribute/header_admin');
		$this->load->view('admin/santri');
		$this->load->view('attribute/footer');
	}
	public function update()
	{	
		$this->load->view('attribute/header_admin');
		$this->load->view('admin/update_santri');
		$this->load->view('attribute/footer');
	}

	public function datatable(){
		$fetch_data = $this->mdl->make_datatables();
		
		
		$data = array();
		$nmr = 0;
		$span = null;
		$jk = null;
		foreach($fetch_data as $row)
		{
			$nmr+=1;
			$status = $row->status_aktif;

			if ($status == 1){
				$span = "<span class='label bg-green'>Aktif</span>";
			}
			else {
				$span = "<span class='label bg-red'>Tidak Aktif</span>";
			}

			$gender = $row->gender;

			if ($gender == 1){
				
				$jk = "<small>Laki-laki</small>";
			}
			else {
				$jk = "<small>Perempuan</small>";
			}

			

			$sub_array = array();
			$sub_array[] = $nmr;
			$sub_array[] = $row->NIS;
			$sub_array[] = $row->nama_santri;
			$sub_array[] = $jk;
			$sub_array[] = $span;
			$sub_array[] = $row->nama_wali;
			$sub_array[] = $row->alamat;
			$sub_array[] = $row->tgl_masuk;
			$sub_array[] = $row->kamar;
			$sub_array[] = $row->tmp_lahir;
			$sub_array[] = $row->tgl_lahir;

			$sub_array[] = '
			
			<a name="edit" id="'.$row->NIS.'" href="'.base_url('admin/Santri/ubah_santri/'.$row->NIS).'" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
			<a href="#" name="remove" id="'.$row->NIS.'" onclick="remove('."'".$row->NIS."','".$row->nama_santri."'".')" title="Hapus"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			';
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

	public function delete_data($NIS)
	{
		$this->mdl->delete_by_id($NIS);
		echo json_encode(array("status" => TRUE));
	}
	public function tambah_santri()
	{	
		

		$data['NIS']			=$this->input->post('NIS');
		$data['nama_santri']	=$this->input->post('nama_santri');
		$data['gender']			=$this->input->post('gender');
		$data['status_aktif']	=$this->input->post('status_aktif');
		$data['nama_wali']		=$this->input->post('nama_wali');
		$data['alamat']			=$this->input->post('alamat');
		$data['tgl_masuk']		=$this->input->post('tgl_masuk');
		$data['kamar']			=$this->input->post('kamar');
		$data['tmp_lahir']		=$this->input->post('tmp_lahir');
		$data['tgl_lahir']		=$this->input->post('tgl_lahir');
		
		$this->mdl->getInsert($data);
		$this->session->set_flashdata('info','Data Sukses di Simpan');
		redirect('admin/santri');
		unset($data);
	}
	public function ubah_santri($NIS)
	{
		
		$data['data']= $this->mdl->data_santri($NIS)->row();

		$this->load->view('attribute/header_admin');
		$this->load->view('admin/update_santri',$data);
		$this->load->view('attribute/footer');
		unset($data);
	}
	public function proses_ubah_santri()
	{
		$data['nama_santri']	=$this->input->post('nama_santri');
		$data['gender']			=$this->input->post('gender');
		$data['status_aktif']	=$this->input->post('status_aktif');
		$data['nama_wali']		=$this->input->post('nama_wali');
		$data['alamat']			=$this->input->post('alamat');
		$data['tgl_masuk']		=$this->input->post('tgl_masuk');
		$data['kamar']			=$this->input->post('kamar');
		$data['tmp_lahir']		=$this->input->post('tmp_lahir');
		$data['tgl_lahir']		=$this->input->post('tgl_lahir');

		$NIS					=$this->input->post('NIS');

		$this->mdl->getUpdate($NIS,$data);
		redirect('admin/santri');
		unset($NIS,$data);
	}
}
