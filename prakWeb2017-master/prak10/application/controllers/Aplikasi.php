<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function penjumlahan($angka1,$angka2)
	{
		$data['angka1']=$angka1;
		$data['angka2']=$angka2;
		$data['hasil']=$angka1 + $angka2;
		$data['oke']='iqbal fauzi';

		$this->load->view('v_penjumlahan',$data);
	}
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_aplikasi');
	}
	public function index()
	{
		$this->load->view('v_home');
	}
	public function kalkulator_view()
	{
		$this->load->view('v_aplikasi');
	}
	public function mhs_view()
	{
		$this->load->view('mhs');
	}
	public function kalkulator()
	{
		$angka1 = $this->input->post('angka1');
		$angka2 = $this->input->post('angka2');
		$pilih_hitung=$this->input->post('pilih-hitung');
		$hasil_hitung=0;

		if($pilih_hitung == "+"){
			$hasil_hitung=$angka1+$angka2;
		}else if($pilih_hitung == "-"){
			$hasil_hitung=$angka1-$angka2;
		}else if($pilih_hitung == "*"){
			$hasil_hitung=$angka1*$angka2;
		}else if($pilih_hitung == "/"){
			$hasil_hitung=$angka1/$angka2;
		}
		$data['angka1']=$angka1;
		$data['angka2']=$angka2;
		$data['pilih_hitung']=$pilih_hitung;
		$data['hasil_hitung']=$hasil_hitung;
		$data['oke']='iqbal fauzi';

		$this->M_aplikasi->simpan($data);

		$this->load->view('v_aplikasi',$data);

	}
	public function mhs()
	{
		$data['nim'] = $this->input->post('nim');
		$data['nama'] = $this->input->post('nama');
		$data['tempat']=$this->input->post('tempat');
		$data['tgl'] = $this->input->post('tgl');
		$data['jk'] = $this->input->post('jk');
		$data['alamat']=$this->input->post('alamat');

		$this->M_aplikasi->simpan_mhs($data);

		$this->load->view('mhs',$data);

	}
	
}
