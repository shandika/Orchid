<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marketing_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function simpanDataPelanggan($data) {
        $this->db->insert('customer', $data);
    }

    function tampilDataPelanggan() {
        $query = $this->db->get('customer');
        return $query;
    }
}
