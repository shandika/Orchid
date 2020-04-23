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
}
