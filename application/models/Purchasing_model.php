<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchasing_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function tampilDataPR()
    {
        $this->db->where('status', 0);
        $query = $this->db->get('barang_pr');
        return $query;
    }
}
