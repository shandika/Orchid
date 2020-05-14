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
        $query = $this->db->query("SELECT MAX(ID_angsuran_barang_pr) as idangsuranbarangpr from angsuran_barang_pr");
        $hasil = $query->row();
        return $hasil->idangsuranbarangpr;
    }
    public function delete($id)
    {
        // $row = $this->db->where('nama_gl', $namaGl)->get($namaGl)->row();
        // $this->db->where('nama_gl', $namaGl);
        // $this->db->delete($namaGl);

        $row = $this->db->where('ID_project', $id)->get('project')->row();
        unlink('./assets/images/project/' . $row->foto);
        $this->db->where('ID_project', $id);
        $this->db->delete($this->_table);
        return true;
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

    public function simpanpr($id_pr, $id_ud, $nama, $harga, $jumlah, $total_harga,  $supplier, $jenis_bayar, $lama_cicilan, $waktu_tunggu, $status, $tanggal_pr, $id_pm)
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
            'waktu_tunggu' => $waktu_tunggu,
            'status' => $status,
            'tanggal_pr' => $tanggal_pr,
            'ID_pm' => $id_pm,
        ];

        $this->db->insert('barang_pr', $data);
    }

    public function cicilanpr($id, $angsuranke, $jumlah, $sisa, $status, $id_barang_pr)
    {

        $data = [
            'ID_angsuran_barang_pr' => $id,
            'angsuranke' => $angsuranke,
            'jumlah_pembayaran' => $jumlah,
            'sisa_pembayaran' => $sisa,
            'status' => $status,
            'ID_barang_pr' => $id_barang_pr,
        ];

        $this->db->insert('angsuran_barang_pr', $data);
    }

    function cekIdUnit()
    {
        $query = $this->db->query("SELECT MAX(ID_unit) as idunit from unit");
        $hasil = $query->row();
        return $hasil->idunit;
    }

    public function simpanDataUnit($data)
    {
        $this->db->insert_batch('unit', $data);
    }
    public function cek_msg() {
        $hsl = $this->db->query("SELECT ID_dp, ID_invoice_dp, nominal_angsuran_dp, angsuran_dp.status, customer.nama, customer.no_ktp FROM customer JOIN angsuran_dp ON customer.no_ktp = angsuran_dp.no_ktp WHERE angsuran_dp.status = 1 AND angsuran_dp.sisa_angsuran='0' ORDER BY angsuran_dp.ID_dp DESC");
        return $hsl;
    }
    public function jum_msg() {
        $query=$this->db->query("SELECT ID_dp, ID_invoice_dp, nominal_angsuran_dp, angsuran_dp.status, customer.nama, customer.no_ktp FROM customer JOIN angsuran_dp ON customer.no_ktp = angsuran_dp.no_ktp WHERE angsuran_dp.status = 1 AND angsuran_dp.sisa_angsuran='0' ORDER BY angsuran_dp.ID_dp DESC");
        return $query->num_rows();
    }
}
