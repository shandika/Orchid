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
    function updatedokumen($gambar)
    {
        $this->db->update('dokumen_pelengkap', $gambar);
    }

    function tampilDataPelanggan()
    {
        $query = $this->db->get('customer');
        return $query;
    }
    function tampilDataPelanggan_bod()
    {
        $this->db->where('acc_bod', 'menunggu');
        $query = $this->db->get('customer');
        return $query;
    }
    function tampilDataPelanggan_keuangan()
    {
        $this->db->where('acc_keuangan', 'menunggu');
        $query = $this->db->get('customer');
        return $query;
    }
    function tampilDataPelangganpilihan($ktp)
    {
        $query = $this->db->query("SELECT * FROM customer where no_ktp='$ktp'");
        return $query;
    }
    function tampilDataAngsuranLain($ktp)
    {
        $query = $this->db->query("SELECT * FROM angsuran_lain JOIN customer ON customer.no_ktp = angsuran_lain.no_ktp WHERE customer.no_ktp = '$ktp'");
        return $query;
    }
    function tampildataajuan($ktp)
    {
        $query = $this->db->query("SELECT * FROM unit_dipesan JOIN project ON unit_dipesan.ID_project = project.ID_project JOIN unit ON unit_dipesan.ID_unit = unit.ID_unit WHERE unit_dipesan.no_ktp = '$ktp'");
        return $query;
    }
    function tampilgambar($ktp)
    {
        $query = $this->db->query("SELECT * FROM dokumen_pelengkap WHERE no_ktp =  '$ktp'");
        return $query;
    }


    function search_cust($nama)
    {
        $this->db->like('nama', $nama, 'BOTH');
        $this->db->where('status_akad', 1);
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
    function cekidvoucher()
    {
        $query = $this->db->query("SELECT MAX(ID_voucher) as idvoucher from voucher");
        $hasil = $query->row();
        return $hasil->idvoucher;
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
    function cekidangsuranbulanandp()
    {
        $query = $this->db->query("SELECT MAX(ID_dp) as idangsurandp from angsuran_dp");
        $hasil = $query->row();
        return $hasil->idangsurandp;
    }
    function cekidinvoicebulanandp()
    {
        $query = $this->db->query("SELECT MAX(ID_invoice_dp) as idinvoiceangsurandp from angsuran_dp");
        $hasil = $query->row();
        return $hasil->idinvoiceangsurandp;
    }
    function cekidinjek()
    {
        $query = $this->db->query("SELECT MAX(ID_injek) as idinjek from angsuran_injek");
        $hasil = $query->row();
        return $hasil->idinjek;
    }
    function cekidinvoiceinjek()
    {
        $query = $this->db->query("SELECT MAX(ID_invoice_injek) as idinvoiceinjek from angsuran_injek");
        $hasil = $query->row();
        return $hasil->idinvoiceinjek;
    }

    function simpanUnitDipilih($id, $no_ktp, $dp, $lama_angsuran_dp, $angsuran_bulanan, $lama_angsuran_bulanan, $total_harga, $ktp_marketing, $id_unit, $id_project, $tanggal_akad, $status_marketing_fee)
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
            'ID_unit' => $id_unit,
            'ID_project' => $id_project,
            'tanggal_akad' => $tanggal_akad,
            'status_marketing_fee' => $status_marketing_fee
        ];
        $this->db->insert('unit_dipesan', $data);
        $this->marketing->update_unit($id_unit);
        $query = $this->db->query("UPDATE project SET unit_kosong = unit_kosong - 1, unit_isi = unit_isi + 1 WHERE ID_project='$id_project'");
        $query = $this->db->query("UPDATE customer SET status_akad = 1 WHERE no_ktp='$no_ktp'");
        return $query;
    }

    //simpan voucher
    function tambahvoucher($id, $nama, $nominal, $expired, $max_used)
    {
        $data = [
            'ID_voucher' => $id,
            'nama' => $nama,
            'nominal' => $nominal,
            'expired' => $expired,
            'max_used' => $max_used,
        ];

        $this->db->insert('voucher', $data);
    }
    public function update_unit($id_unit)
    {
        $data = [
            'status' => '1',
        ];
        $this->db->where('ID_unit', $id_unit);
        $this->db->update('unit', $data);
    }

    function proyeksi_angsuran($id, $ktp, $ke, $tanggal, $bulan, $tahun, $date, $nominal, $sisa, $status, $invoice)
    {
        $data = [
            'ID_angsuran_bulanan' => $id,
            'no_ktp' => $ktp,
            'angsuran_ke' => $ke,
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'date' => $date,
            'nominal_angsuran_bulanan' => $nominal,
            'sisa_angsuran' => $sisa,
            'status' => $status,
            'status_email' => '0',
            'ID_invoice_angsuran_bulanan' => $invoice
        ];
        $this->db->insert('angsuran_bulanan', $data);
    }
    function proyeksi_angsuran_dp($id, $ktp, $ke, $tanggal, $bulan, $tahun, $date, $nominal, $sisa, $status, $invoice)
    {
        $data = [
            'ID_dp' => $id,
            'no_ktp' => $ktp,
            'angsuran_ke' => $ke,
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'date' => $date,
            'nominal_angsuran_dp' => $nominal,
            'sisa_angsuran' => $sisa,
            'status' => $status,
            'status_email' => '0',
            'ID_invoice_dp' => $invoice
        ];
        $this->db->insert('angsuran_dp', $data);
    }
    function proyeksi_angsuran_injek($id, $ktp, $ke, $tanggal, $bulan, $tahun, $date, $nominal, $sisa, $status, $invoice)
    {
        $data = [
            'ID_injek' => $id,
            'no_ktp' => $ktp,
            'angsuran_ke' => $ke,
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'date' => $date,
            'nominal_injek' => $nominal,
            'sisa_angsuran' => $sisa,
            'status' => $status,
            'status_email' => '0',
            'ID_invoice_injek' => $invoice
        ];
        $this->db->insert('angsuran_injek', $data);
    }

    function cekidfee()
    {
        $query = $this->db->query("SELECT MAX(ID_marketing_fee) as id from marketing_fee");
        $hasil = $query->row();
        return $hasil->id;
    }
    function tambahDataMF($id, $idUnit, $agen, $inhouse, $persenan, $marketingFee, $closingFee, $direkturFee)
    {
        $data = [
            'ID_marketing_fee'      => $id,
            'ID_unit_dipesan'       => $idUnit,
            'agen'                  => $agen,
            'inhouse'               => $inhouse,
            'persenan'              => $persenan,
            'nominal_marketing_fee' => $marketingFee,
            'nominal_closing_fee'   => $closingFee,
            'direktur_fee'          => $direkturFee,
            'total_fee'             => $marketingFee + $closingFee + $direkturFee
        ];
        $this->db->insert('marketing_fee', $data);
        $this->db->query("UPDATE unit_dipesan SET status_marketing_fee = 'TERHITUNG' WHERE unit_dipesan.ID_unit_dipesan = '$idUnit'; ");
    }

    function updatedatacustomer($ktp, $data)
    {
        $this->db->where('no_ktp', $ktp);
        $this->db->update('customer', $data);
    }
}
