<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_aplikasi', 'app');
	}

	public function index()
	{
		$this->load->view('v_aplikasi');
	}

	public function penjumlahan($angka1, $angka2){
		$data['angka1'] = $angka1;
		$data['angka2'] = $angka2;
		$data['hasil'] = $angka1 + $angka2;

		$this->load->view('v_penjumlahan', $data);
	}

	public function kalkulator(){
		$angka1 = $this->input->post('angka1');
		$angka2 = $this->input->post('angka2');
		$operator = $this->input->post('operator');
		$hasil_hitung = 0;

		if ($operator == "+") {
			$hasil_hitung = $angka1 + $angka2;
		}
		elseif ($operator == "-") {
			$hasil_hitung = $angka1 - $angka2;	
		}
		elseif ($operator == "*") {
			$hasil_hitung = $angka1 * $angka2;	
		}
		elseif ($operator == "/") {
			$hasil_hitung = $angka1 / $angka2;	
		}

		$data['angka1'] = $angka1;
		$data['angka2'] = $angka2;
		$data['operator'] = $operator;
		$data['hasil'] = $hasil_hitung;

		$this->app->simpan($data);

		$this->load->view('v_aplikasi', $data);
	}
}
