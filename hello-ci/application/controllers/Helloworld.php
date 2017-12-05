
<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Helloworld extends CI_Controller
{
    public function index()
    {
        //Kode ini digunakan untuk menghubungkan controller dengan model yang kita buat.
    $data = $this->load->model('mymodel');
    //Kode ini sudah kita pelajari pada tutorial sebelumnya.
    $data = $this->mymodel->GetMahasiswa('mahasiswa');
    //Kode ini digunakan untuk mengubah data yang sudah kita panggil dari model menjadi sebuah array.
    $data = array('data' => $data);
    // Kode ini merupakan Kode memanggil View, namun kita menambahkan , $data untuk membawa
    // data dari model ke dalam View, sehingga $data dalam view merupakan sebuah array yang berisi data dari model.
    $this->load->view('data_mahasiswa', $data);
    }
    public function add_data()
    {
        $this->load->view('form_add');
    }
    public function insert()
    {
        $this->load->model('mymodel');
        $data = array(
         'no_induk' => $this->input->post('no_induk'),
         'nama' => $this->input->post('nama'),
         'alamat' => $this->input->post('alamat'),
     );
        $data = $this->mymodel->Insert('mahasiswa', $data);
        redirect(base_url(), 'refresh');
    }
    public function delete_data($noinduk)
    {
        $noinduk = array('no_induk' => $noinduk);
        $this->load->model('mymodel');
        $this->mymodel->delete('mahasiswa', $noinduk);
        redirect(base_url(), 'refresh');
    }
    public function GetWhere($table, $data)
    {
        $res = $this->db->get_where($table, $data);

        return $res->result_array();
    }

    public function edit_data($noinduk)
    {
        $this->load->model('mymodel');
        $siswa = $this->mymodel->GetWhere('mahasiswa', array('no_induk' => $noinduk));
        $data = array(
         'no_induk' => $siswa[0]['no_induk'],
         'nama' => $siswa[0]['nama'],
         'alamat' => $siswa[0]['alamat'],
     );
        $this->load->view('form_edit', $data);
    }
    public function update_data()
    {
        $no_induk = $POST('ni');
        $nama == $_POST['nama'];
        $alamat = $_POST['alamat'];
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
    
        );
        $where = array(
            'no_induk' => $no_induk,
        );
        $this->load->model('mymodel');
        $res = $this->model->Update('mahasiswa',$data,$where);
        if($res>0){
            redirect('helloworld/index','refresh');
        }
}

}
