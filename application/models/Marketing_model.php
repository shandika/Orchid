<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marketing_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function simpanDataPelanggan($data, $gambar, $result)
    {
        $this->db->insert('customer', $data);
        $this->db->insert('dokumen_pelengkap', $gambar);
        $this->db->insert_batch('angsuran_lain', $result);
    }

    function tampilDataPelanggan()
    {
        $query = $this->db->get('customer');
        return $query;
    }

    function search_cust($nama)
    {
        $this->db->like('nama', $nama, 'BOTH');
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(20);
        return $this->db->get('customer')->result();
    }


    function get_unit($id_project)
    {
        $this->db->where('ID_project', $id_project);
        $this->db->where('status', 0);
        $result = $this->db->get('unit')->result();

        return $result;
    }

    function cekidunitdipesan()
    {
        $query = $this->db->query("SELECT MAX(ID_unit_dipesan) as idunitdipesan from unit_dipesan");
        $hasil = $query->row();
        return $hasil->idunitdipesan;
    }
    function cekidangsuranbulanan()
    {
        $query = $this->db->query("SELECT MAX(ID_angsuran_bulanan) as idangsuranbulanan from angsuran_bulanan");
        $hasil = $query->row();
        return $hasil->idangsuranbulanan;
    }
    function cekidinvoicebulanan()
    {
        $query = $this->db->query("SELECT MAX(ID_invoice_angsuran_bulanan) as idinvoiceangsuranbulanan from angsuran_bulanan");
        $hasil = $query->row();
        return $hasil->idinvoiceangsuranbulanan;
    }

    function simpanUnitDipilih($id, $no_ktp, $dp, $lama_angsuran_dp, $angsuran_bulanan, $lama_angsuran_bulanan, $total_harga, $ktp_marketing, $id_unit, $id_project)
    {
        $data = [
            'ID_unit_dipesan' => $id,
            'no_ktp' => $no_ktp,
            'DP' => $dp,
            'lama_angsuran_dp' => $lama_angsuran_dp,
            'angsuran_bulanan' => $angsuran_bulanan,
            'lama_angsuran' => $lama_angsuran_bulanan,
            'total_harga' =>  $total_harga,
            'ktp_marketing' => $ktp_marketing,
            'ID_unit' => $id_unit
        ];
        $this->db->insert('unit_dipesan', $data);
        $this->marketing->update_unit($id_unit);
        $query = $this->db->query("UPDATE project SET unit_kosong = unit_kosong - 1, unit_isi = unit_isi + 1 WHERE ID_project='$id_project'");
        return $query;
    }

    public function update_unit($id_unit)
    {
        $data = [
            'status' => '1',
        ];
        $this->db->where('ID_unit', $id_unit);
        $this->db->update('unit', $data);
    }

    function proyeksi_angsuran($id, $ktp, $ke, $tanggal, $bulan, $tahun, $nominal, $sisa, $status, $invoice)
    {
        $data = [
            'ID_angsuran_bulanan' => $id,
            'no_ktp' => $ktp,
            'angsuran_ke' => $ke,
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'nominal_angsuran_bulanan' => $nominal,
            'sisa_angsuran' => $sisa,
            'status' => $status,
            'ID_invoice_angsuran_bulanan' => $invoice
        ];
        $this->db->insert('angsuran_bulanan', $data);
    }
}
