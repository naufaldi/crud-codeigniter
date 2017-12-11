<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_santri extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('Loginauth');
		$this->loginauth->view_page();
		$this->load->library('Recaptcha');

		$this->load->model("admin/M_admin",'mdl');
	}

	public function index(){
		$Data['jml_Ustadz']		= $this->db->get('tb_ustadz')->num_rows();
		$Data['jml_Santri']		= $this->db->get('tb_santri')->num_rows();
		$Data['jml_Kelas']		= $this->db->get('tb_kelas')->num_rows();
		$Data['jml_Kitab']	= $this->db->get('tb_kitab')->num_rows();
			
		$this->load->view('attribute/header_santri');
		$this->load->view('santri/dashboard',$Data);
		$this->load->view('attribute/footer');
	}
	public function dashboard()
	{
		$this->load->view('attribute/header_santri');
		$this->load->view('santri/dashboard');
		$this->load->view('attribute/footer');
	}
		public function update(){	
		$this->load->view('attribute/header_santri');
		$this->load->view('santri/update_ustadz');
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
				// $jk = "<span class='label bg-green'>Perempuan</span>";
				$jk = "<small>Perempuan</small>";
			}

			$sub_array = array();
			$sub_array[] = $nmr;
			$sub_array[] = $row->kode_ustadz;
			$sub_array[] = $row->nama_ustadz;
			$sub_array[] = $jk;
			$sub_array[] = $span;
			$sub_array[] = $row->alamat;
			$sub_array[] = $row->tgl_lahir;
			$sub_array[] = $row->no_telp;

			$sub_array[] = '
			
			<a name="edit" id="'.$row->kode_ustadz.'" href="'.base_url('santri/C_santri/ubah_ustadz/'.$row->kode_ustadz).'" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
			<a href="#" name="remove" id="'.$row->kode_ustadz.'" onclick="remove('."'".$row->kode_ustadz."','".$row->nama_ustadz."'".')" title="Hapus"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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

	public function delete_data($kode_ustadz)
	{
		$this->mdl->delete_by_id($kode_ustadz);
		echo json_encode(array("status" => TRUE));
	}
	public function tambah_ustadz()
	{	
		$data['kode_ustadz']	=$this->input->post('kode_ustadz');
		$data['nama_ustadz']	=$this->input->post('nama_ustadz');
		$data['gender']			=$this->input->post('gender');
		$data['status_aktif']	=$this->input->post('status_aktif');
		$data['alamat']			=$this->input->post('alamat');
		$data['tgl_lahir']		=$this->input->post('tgl_lahir');
		$data['no_telp']		=$this->input->post('no_telp');
		
		$this->mdl->getInsert($data);
		$this->session->set_flashdata('info','Data Sukses di Simpan');
		redirect('santri/ustadz');
		unset($data);
	}
	public function ubah_ustadz($kode_ustadz)
	{
		
		$data['ust']= $this->mdl->data_ustadz($kode_ustadz)->row();

		$this->load->view('attribute/header_santri');
		$this->load->view('santri/update_ustadz',$data);
		$this->load->view('attribute/footer');
		unset($data);
	}
	public function proses_ubah_ustadz()
	{
		$data['nama_ustadz']	=$this->input->post('nama_ustadz');
		$data['gender']			=$this->input->post('gender');
		$data['status_aktif']	=$this->input->post('status_aktif');
		$data['alamat']			=$this->input->post('alamat');
		$data['tgl_lahir']		=$this->input->post('tgl_lahir');
		$data['no_telp']		=$this->input->post('no_telp');

		$kode_ustadz			=$this->input->post('kode_ustadz');

		$this->mdl->getUpdate($kode_ustadz,$data);
		redirect('santri/ustadz');
		unset($kode_ustadz,$data);
	}
}
