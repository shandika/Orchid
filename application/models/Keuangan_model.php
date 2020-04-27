<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function simpanDataGL($data, $namagl)
    {
        $this->db->insert($namagl, $data);
    }

    function tampilDataGL()
    {
        $query = $this->db->get('general_ledger');
        return $query;
    }
    function tampilDataproject()
    {
        $query = $this->db->get('project');
        return $query;
    }
    function search_gl($nama)
    {
        $this->db->like('nama', $nama, 'BOTH');
        $this->db->order_by('nama', 'ASC');

        return $this->db->get('general_ledger')->result();
    }
    function search_cust($nama)
    {
        $hsl = $this->db->query("SELECT ID_dp, ID_invoice_dp, nominal_angsuran_dp, angsuran_dp.status, customer.nama, customer.no_ktp FROM customer JOIN angsuran_dp ON customer.no_ktp = angsuran_dp.no_ktp WHERE customer.nama LIKE '$nama%' AND angsuran_dp.status = 0 LIMIT 1")->result();
        return $hsl;
    }
    function search_bulanan($nama)
    {
        $hsl = $this->db->query("SELECT ID_angsuran_bulanan, ID_invoice_angsuran_bulanan, nominal_angsuran_bulanan, angsuran_bulanan.status, customer.nama, customer.no_ktp FROM customer JOIN angsuran_bulanan ON customer.no_ktp = angsuran_bulanan.no_ktp WHERE customer.nama LIKE '$nama%' AND angsuran_bulanan.status = 0 LIMIT 1")->result();
        return $hsl;
    }
    function get_invoice($no_ktp)
    {
        $this->db->where('no_ktp', $no_ktp);
        $this->db->where('status', 0);
        $result = $this->db->get('angsuran_dp')->result();

        return $result;
    }

    function tambahjournal($id, $nomor, $nama, $debit, $kredit, $ket, $tanggal, $id_project, $debithasil, $dbnya)
    {
        $data = [
            'id_journal' => $id,
            'nomor_gl' => $nomor,
            'nama_gl' => $nama,
            'debit' => $debit,
            'kredit' => $kredit,
            'keterangan' => $ket,
            'tanggal_input' => $tanggal,
            'ID_project' => $id_project,
        ];
        $this->db->insert('journal', $data);
        $this->keuangan->update_gl($nomor, $debithasil, $dbnya);
    }
    function cekidjournal()
    {
        $query = $this->db->query("SELECT MAX(id_journal) as idjournal from journal");
        $hasil = $query->row();
        return $hasil->idjournal;
    }

    function ceknamagl($idproject)
    {
        $query = $this->db->query("SELECT nama_gl  from project WHERE ID_project='$idproject'");
        $hasil = $query->row();
        return $hasil->nama_gl;
    }
    function ceksaldo($nomor, $namadbnya)
    {
        $query = $this->db->query("SELECT nominal  from $namadbnya WHERE nomor='$nomor'");
        $hasil = $query->row();
        return $hasil->nominal;
    }
    public function update_gl($nomor, $debit, $dbnya)
    {
        $data = [
            'nominal' => $debit,
        ];
        $this->db->where('nomor', $nomor);
        $this->db->update($dbnya, $data);
    }

    public function bayarangsuran($idinvoice, $idangsuran, $tanggal, $nominal, $type, $namabank, $nomorbank)
    {
        $data_angsuran_bulanan = [
            'ID_invoice_angsuran_bulanan' => $idinvoice,
            'ID_angsuran_bulanan' => $idangsuran,
            'tanggal_pembayaran' => $tanggal,
            'nominal' => $nominal,
            'type_pembayaran' => $type,
            'nama_bank' => $namabank,
            'nomor_bank' => $nomorbank,
        ];
        $data_angsuran_dp = [
            'ID_invoice_dp' => $idinvoice,
            'ID_dp' => $idangsuran,
            'tanggal_bayar' => $tanggal,
            'nominal' => $nominal,
            'type_pembayaran' => $type,
            'nama_bank' => $namabank,
            'nomor_bank' => $nomorbank,
        ];
        $data_angsuran_injek = [
            'ID_invoice_injek' => $idinvoice,
            'ID_injek' => $idangsuran,
            'tanggal_bayar' => $tanggal,
            'nominal' => $nominal,
            'type_pembayaran' => $type,
            'nama_bank' => $namabank,
            'nomor_bank' => $nomorbank,
        ];

        if (stripos($idinvoice, 'IDP') !== false) {
            $this->db->insert('invoice_dp', $data_angsuran_dp);
            $this->keuangan->update_angsuran($idangsuran, "ID_dp", "angsuran_dp");
        } elseif (stripos($idinvoice, 'IAB') !== false) {
            $this->db->insert('invoice_angsuran_bulanan', $data_angsuran_bulanan);
            $this->keuangan->update_angsuran($idangsuran, "ID_angsuran_bulanan", "angsuran_bulanan");
        } elseif (stripos($idinvoice, 'IIJ') !== false) {
            $this->db->insert('invoice_injek', $data_angsuran_injek);
            $this->keuangan->update_angsuran($idangsuran, "ID_injek", "angsuran_injek");
        }
    }
    public function update_angsuran($idbayar, $nama_bayar, $database)
    {
        $data = [
            'status' => '1',
        ];
        $this->db->where($nama_bayar, $idbayar);
        $this->db->update($database, $data);
    }

    public function view_data($id_project)
    {
        $query = $this->db->get($id_project);
        return $query;
    }
}
