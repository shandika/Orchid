<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pm_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    private $_table = "project";


    public function getAll()
    {
        $this->db->order_by('ID_project', 'DESC');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    function cekidproject()
    {
        $query = $this->db->query("SELECT MAX(ID_project) as idproject from project");
        $hasil = $query->row();
        return $hasil->idproject;
    }
    function cekidpr()
    {
        $query = $this->db->query("SELECT MAX(ID_pr) as idpr from barang_pr");
        $hasil = $query->row();
        return $hasil->idpr;
    }
    function cekidangsuranbarangpr()
    {
        $query = $this->db->query("SELECT MAX(ID_angsuran_barang_pr) as idangsuranbarangpr from barang_pr");
        $hasil = $query->row();
        return $hasil->idangsuranbarangpr;
    }
    public function delete($id)
    {
        $this->db->where('ID_project', $id);
        $this->db->delete($this->_table);
    }

    function tambahDataProject($data)
    {
        $this->db->insert('project', $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function get_keywoard($keywoard)
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->like('ID_project', $keywoard);
        $this->db->or_like('nama', $keywoard);
        $this->db->or_like('alamat', $keywoard);
        $this->db->or_like('deskripsi', $keywoard);
        $this->db->or_like('jumlah_unit', $keywoard);
        $this->db->or_like('unit_kosong', $keywoard);
        $this->db->or_like('unit_isi', $keywoard);
        return $this->db->get()->result();
    }

    public function simpanpr($id_pr, $id_ud, $nama, $harga, $jumlah, $total_harga,  $supplier, $jenis_bayar, $lama_cicilan, $ID_angsuran_barang_pr, $waktu_tunggu, $status, $tanggal_pr, $id_pm)
    {
        $data = [
            'ID_pr' => $id_pr,
            'ID_unit_dipesan' => $id_ud,
            'nama_barang' => $nama,
            'harga_barang' => $harga,
            'jumlah' => $jumlah,
            'total_harga' => $total_harga,
            'nama_supplier' => $supplier,
            'jenis_pembayaran' => $jenis_bayar,
            'lama_cicilan' => $lama_cicilan,
            'ID_angsuran_barang_pr' => $ID_angsuran_barang_pr,
            'waktu_tunggu' => $waktu_tunggu,
            'status' => $status,
            'tanggal_pr' => $tanggal_pr,
            'ID_pm' => $id_pm,
        ];

        $this->db->insert('barang_pr', $data);
    }
}
