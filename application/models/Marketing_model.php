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

 
    function get_unit($id_project){
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

    function simpanUnitDipilih($isi)
    {
        $this->db->insert('unit_dupesan', $isi);
    }
}
