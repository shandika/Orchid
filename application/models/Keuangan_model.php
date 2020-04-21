<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function simpanDataGL($data)
    {
        $this->db->insert('general_ledger', $data);
    }

    function tampilDataGL()
    {
        $query = $this->db->get('general_ledger');
        return $query;
    }
    function search_gl($nama)
    {
        $this->db->like('nama', $nama, 'BOTH');
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(20);
        return $this->db->get('general_ledger')->result();
    }
}
