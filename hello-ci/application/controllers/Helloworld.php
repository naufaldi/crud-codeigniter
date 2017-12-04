<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Helloworld extends CI_Controller
{    public function index() {
    //Kode ini digunakan untuk menghubungkan controller dengan model yang kita buat.
        $data = $this->load->model('mymodel');
        //Kode ini sudah kita pelajari pada tutorial sebelumnya.
        $data = $this->mymodel->GetMahasiswa('mahasiswa');
        //Kode ini digunakan untuk mengubah data yang sudah kita panggil dari model menjadi sebuah array.
        $data = array('data' => $data);
        // Kode ini merupakan Kode memanggil View, namun kita menambahkan , $data untuk membawa
        // data dari model ke dalam View, sehingga $data dalam view merupakan sebuah array yang berisi data dari model.
        $this->load->view('data_mahasiswa',$data);
    } 
    public function fungsi()
    {
        echo "Funtion fungsi dari Contorller Hello World";
    }
    public function parameters($nama)
    {
        echo "Selamat datang ".$nama;
    }

}
  