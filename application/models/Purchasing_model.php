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
    public function change_status($idPr, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('ID_pr', $idPr);
        $this->db->update('barang_pr');
    }
    public function delete($id)
    {
        $this->db->where('ID_pr', $id);
        $this->db->delete('barang_pr');
    }
}
