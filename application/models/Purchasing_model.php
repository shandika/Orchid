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
    function tambahPO($id_po, $id_barang_pr, $id_purchasing, $tanggal_approve, $id_pembayaran_po)
    {
        $data = [
            'ID_po' => $id_po,
            'ID_barang_pr' => $id_barang_pr,
            'ID_purchasing' => $id_purchasing,
            'tanggal_approve' => $tanggal_approve,
            'ID_pembayaran_po' => $id_pembayaran_po,
            'dibayar' => "",
            'bukti_bayar' => "",
            'ID_keuangan' => "admin_keuangan",
        ];
        $this->db->insert('po', $data);
    }
    function cekidpr()
    {
        $query = $this->db->query("SELECT MAX(ID_po) as idpr from po");
        $hasil = $query->row();
        return $hasil->idpr;
    }
    function cekidbayarpo()
    {
        $query = $this->db->query("SELECT MAX(ID_pembayaran_po) as idpembayaranpo from po");
        $hasil = $query->row();
        return $hasil->idpembayaranpo;
    }
}
