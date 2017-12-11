
<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Logistik extends CI_Controller
{
    public function __constructor()
    {
        parent::__constructor();
    }
    
    public function index()
    {
        // $this->load->model('Mymodel');        
        $data_a['data']= $this->Mymodel->GetLogistik('logistik');
        $this->load->view('v_header');
        $this->load->view('v_sidebar');
        $this->load->view('data_logistik',$data_a);
        $this->load->view('v_footer');

        //Kode ini digunakan untuk menghubungkan controller dengan model yang kita buat.
    // $data = $this->load->model('mymodel');
    //Kode ini sudah kita pelajari pada tutorial sebelumnya.
    // $data = $this->mymodel->GetLogistik('logistik');
    //Kode ini digunakan untuk mengubah data yang sudah kita panggil dari model menjadi sebuah array.
    // $data_a = array('data' => $data);
    // Kode ini merupakan Kode memanggil View, namun kita menambahkan , $data untuk membawa
    // data dari model ke dalam View, sehingga $data dalam view merupakan sebuah array yang berisi data dari model.
    // $this->load->view('data_logistik', $data);
    }
    public function add_data()
    {
        $this->load->view('form_add');
    }
    public function insert()
    {
        $this->load->model('mymodel');
        $data = array(
         'no_barang' => $this->input->post('no_barang'),
         'nama_barang' => $this->input->post('nama_barang'),
         'no_jenis' => $this->input->post('no_jenis'),
         'tanggal_barang' => $this->input->post('tanggal_barang'),
         'keterangan' => $this->input->post('keterangan'),
         'jumlah' => $this->input->post('jumlah'),

     );
        $data = $this->mymodel->Insert('logistik', $data);
        redirect(base_url(), 'refresh');
    }
    public function delete_data($nobarang)
    {
        $nobarang = array('no_barang' => $nobarang);
        $this->load->model('mymodel');
        $this->mymodel->delete('logistik', $nobarang);
        redirect(base_url(), 'refresh');
    }

    public function edit_data($nobarang)
    {
        $this->load->model('mymodel');
        $barang = $this->mymodel->GetWhere('logistik', array('no_barang' => $nobarang));
        $data = array(
         'no_barang' => $barang[0]['no_barang'],
         'nama_barang' => $barang[0]['nama_barang'],
         'no_jenis' => $barang[0]['no_jenis'],
         'tanggal_barang' => $barang[0]['tanggal_barang'],
         'keterangan' => $barang[0]['keterangan'],
         'jumlah' => $barang[0]['jumlah']

     );
        $this->load->view('form_edit', $data);
    }
    public function update_data()
    {
        $no_barang = $_POST['no_barang'];
        $nama_barang = $_POST['nama_barang'];
        $no_jenis = $_POST['no_jenis'];
        $tanggal_barang = $_POST['tanggal_barang'];
        $tanggal_barang = $_POST['tanggal_barang'];
        $keterangan = $_POST['keterangan'];
        $jumlah = $_POST['jumlah'];
        $data = array(
            'nama_barang' => $nama_barang,
            'nama_barang' => $nama_barang,
            'no_jenis' => $no_jenis,
            'tanggal_barang' => $tanggal_barang,
            'keterangan' => $keterangan,
            'jumlah' => $jumlah
        );
        $where = array(
            'no_barang' => $no_barang,
        );
        $this->load->model('mymodel');
        $res = $this->mymodel->Update('logistik', $data, $where);
        if ($res>0) {
            redirect('logistik/index','refresh');
        }
    }

}
