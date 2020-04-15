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
}
