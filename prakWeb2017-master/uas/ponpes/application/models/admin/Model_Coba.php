<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Coba extends CI_Model {

	var $table = 'tb_transaksi_peminjaman,tb_master_buku,tb_santri';
	var $column = array('tb_santri.nama_santri','tb_santri.alamat','tb_master_buku.judulBuku','tb_master_buku.penerbitBuku','tb_transaksi_peminjaman.jumlahPinjam','tb_transaksi_peminjaman.tanggalPeminjaman','tb_transaksi_peminjaman.tanggalPengembalian');
	var $order = array('tb_transaksi_peminjaman.idPeminjaman' => 'desc');
	var $relasi='tb_transaksi_peminjaman.idBuku=tb_master_buku.idBuku and tb_transaksi_peminjaman.NIS=tb_santri.NIS';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function tampil_data_siswa($NIS)
	{
		$this->db->from('tb_santri');
		$this->db->where('NIS',$NIS);
		$query = $this->db->get();

		return $query->row();
	}

	function tampil_data_buku($idBuku)
	{
		$this->db->from('tb_master_buku');
		$this->db->where('idBuku',$idBuku);
		$query = $this->db->get();

		return $query->row();
	}

	function tampil_jumlah_buku($idBuku)
	{
		$this->db->from('tb_master_buku');
		$this->db->where('idBuku',$idBuku);
		$query = $this->db->get();

		return $query->row();
	}

	private function _get_datatables_query()
	{
		$this->db->from($this->table);
		// untuk relasi tambahkan ini
		$this->db->where($this->relasi);

		$i = 0;

		foreach ($this->column as $item)
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}

		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		/*else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}*/
		else
		{
			$this->db->order_by('tb_transaksi_peminjaman.idPeminjaman', 'DESC');
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($idPeminjaman)
	{
		$this->db->from('tb_transaksi_peminjaman');
		$this->db->where('idPeminjaman',$idPeminjaman);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('tb_transaksi_peminjaman', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('tb_transaksi_peminjaman', $data, $where);
		return $this->db->affected_rows();
	}

	public function updatepaspinjam($where, $datapinjam)
	{
		$this->db->update('tb_master_buku', $datapinjam, $where);
		// return $this->db->affected_rows();
	}

	public function delete_by_id($idPeminjaman)
	{
		$this->db->where('idPeminjaman', $idPeminjaman);
		$this->db->delete('tb_transaksi_peminjaman');
	}

}
