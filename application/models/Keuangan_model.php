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
    function simpanDataGLutama($data)
    {
        $this->db->insert('general_ledger', $data);
    }

    function bayarPO()
    {
        $query = $this->db->query("SELECT po.ID_po, po.ID_barang_pr, po.ID_purchasing, po.tanggal_approve, barang_pr.nama_barang, barang_pr.harga_barang, barang_pr.jumlah, barang_pr.total_harga, barang_pr.nama_supplier, barang_pr.waktu_tunggu, barang_pr.jenis_pembayaran, barang_pr.lama_cicilan FROM po JOIN barang_pr ON po.ID_barang_pr=barang_pr.ID_pr WHERE po.dibayar = 'menunggu'");
        return $query;
    }

    function admin_fee()
    {
        $query = $this->db->query("SELECT unit_dipesan.ID_unit_dipesan,unit_dipesan.status_marketing_fee, akun_marketing.nama, unit_dipesan.tanggal_akad, unit.type, unit.nomor, unit_dipesan.total_harga, unit_dipesan.DP from unit_dipesan JOIN akun_marketing ON unit_dipesan.ktp_marketing=akun_marketing.ktp JOIN unit ON unit_dipesan.ID_unit = unit.ID_unit WHERE unit_dipesan.status_marketing_fee = 'MENUNGGU'");
        return $query;
    }
    function marketing_fee()
    {
        $query = $this->db->query("SELECT akun_marketing.nama, unit_dipesan.tanggal_akad, unit.type, unit.nomor, unit_dipesan.total_harga, unit_dipesan.DP, marketing_fee.agen, marketing_fee.inhouse, marketing_fee.persenan, marketing_fee.nominal_marketing_fee, marketing_fee.nominal_closing_fee, marketing_fee.direktur_fee, marketing_fee.total_fee from unit_dipesan JOIN akun_marketing ON unit_dipesan.ktp_marketing=akun_marketing.ktp JOIN unit ON unit_dipesan.ID_unit = unit.ID_unit JOIN marketing_fee ON unit_dipesan.ID_unit_dipesan = marketing_fee.ID_unit_dipesan");
        return $query;
    }
    function updatePO($id, $ID_keuangan, $bukti)
    {
        $this->db->set('bukti_bayar', $bukti);
        $this->db->set('dibayar', 'dibayar');
        $this->db->set('ID_keuangan', $ID_keuangan);
        $this->db->where('ID_po', $id);
        $this->db->update('po');
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
    function cek_project_gl($id)
    {
        $query = $this->db->query("SELECT nama_gl from project WHERE ID_project='$id'");
        $hasil = $query->row();
        return $hasil;
    }
    function search_gl($nama)
    {
        $this->db->like('nama', $nama, 'BOTH');
        $this->db->order_by('nama', 'ASC');

        return $this->db->get('general_ledger')->result();
    }
    function search_cust($nama)
    {
        $hsl = $this->db->query("SELECT ID_dp, ID_invoice_dp, nominal_angsuran_dp, angsuran_dp.status, customer.nama, customer.no_ktp FROM customer JOIN angsuran_dp ON customer.no_ktp = angsuran_dp.no_ktp WHERE customer.nama LIKE '%$nama%' and angsuran_dp.status = 0 LIMIT 1 ")->result();
        return $hsl;
    }
    function search_bulanan($nama)
    {
        $hsl = $this->db->query("SELECT ID_angsuran_bulanan, ID_invoice_angsuran_bulanan, nominal_angsuran_bulanan, angsuran_bulanan.status, customer.nama, customer.no_ktp FROM customer JOIN angsuran_bulanan ON customer.no_ktp = angsuran_bulanan.no_ktp WHERE customer.nama LIKE '%$nama%' AND angsuran_bulanan.status = 0 LIMIT 1")->result();
        return $hsl;
    }
    function search_injek($nama)
    {
        $hsl = $this->db->query("SELECT ID_injek, ID_invoice_injek, nominal_injek, angsuran_injek.status, customer.nama, customer.no_ktp FROM customer JOIN angsuran_injek ON customer.no_ktp = angsuran_injek.no_ktp WHERE customer.nama LIKE '%$nama%' AND angsuran_injek.status = 0 LIMIT 1")->result();
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
    public function rubah_angsuran($ktp)
    {
        $query = $this->db->query("SELECT SUM(nominal_angsuran_bulanan) as nominal FROM angsuran_bulanan WHERE status = '0' AND no_ktp = '$ktp'")->result();
        return $query;
    }
    public function rubah_angsuran2($ktp)
    {
        $query2 = $this->db->query("SELECT SUM(nominal_angsuran_dp) as nominal FROM angsuran_dp WHERE status = '0' AND no_ktp = '$ktp'")->result();
        return $query2;
    }
    public function rubah_angsuran3($ktp)
    {
        $query3 = $this->db->query("SELECT SUM(nominal_injek) as nominal FROM angsuran_injek WHERE status = '0' AND no_ktp = '$ktp'")->result();
        return $query3;
    }
    public function rubah_injek($ktp)
    {
        $query = $this->db->query("SELECT SUM(nominal_injek) as nominal FROM angsuran_injek WHERE status = '0' AND no_ktp = '$ktp'");
        return $query;
    }
    public function rubah_unit($ktp)
    {
        $query = $this->db->query("SELECT ID_unit FROM unit_dipesan WHERE no_ktp ='$ktp'");
        return $query;
    }
    public function pilih_unit($ktp)
    {
        $query = $this->db->query("SELECT unit.ID_unit FROM unit JOIN unit_dipesan ON unit_dipesan.ID_project = unit.ID_project WHERE unit.status = '0' AND unit_dipesan.no_ktp = '$ktp'");
        return $query;
    }
    public function rubah_project($ktp)
    {
        $query = $this->db->query("SELECT unit_dipesan.ID_project FROM unit_dipesan JOIN unit ON unit_dipesan.ID_unit = unit.ID_unit WHERE unit_dipesan.no_ktp = '$ktp'");
        return $query;
    }
    function get_unit($id_project)
    {
        $this->db->where('ID_project', $id_project);
        $this->db->where('status', 0);
        $result = $this->db->get('unit')->result();

        return $result;
    }
    function update_addendum_angsuran($no_ktp)
    {
        $data = [
            'status' => '2',
        ];
        $this->db->where('no_ktp', $no_ktp);
        $this->db->update('angsuran_bulanan', $data);
    }
    function update_addendum_injek($no_ktp)
    {
        $data = [
            'status' => '2',
        ];
        $this->db->where('no_ktp', $no_ktp);
        $this->db->update('angsuran_injek', $data);
    }
    function update_addendum_unit_dipesan($no_ktp, $id_unit)
    {
        $data = [
            'ID_unit' => $id_unit,
        ];
        $this->db->where('no_ktp', $no_ktp);
        $this->db->update('unit_dipesan', $data);
    }
    function update_addendum_project($no_ktp, $id_unit, $id_project, $id_project_sebelumnya)
    {
        $data = [
            'ID_unit' => $id_unit,
            'ID_project' => $id_project,
        ];
        $this->db->where('no_ktp', $no_ktp);
        $this->db->update('unit_dipesan', $data);
        $this->db->trans_start();
        $query = $this->db->query("UPDATE project SET unit_kosong = unit_kosong - 1, unit_isi = unit_isi + 1 WHERE ID_project='$id_project'");
        $query = $this->db->query("UPDATE project SET unit_kosong = unit_kosong + 1, unit_isi = unit_isi - 1 WHERE ID_project='$id_project_sebelumnya'");
        $this->db->trans_complete();
        return $query;
    }
    function update_addendum_unit($id_unit)
    {
        $data = [
            'status' => 0,
        ];
        $this->db->where('ID_unit', $id_unit);
        $this->db->update('unit', $data);
    }
    function update_addendum_unit_tambah($id_unit)
    {
        $data = [
            'status' => 1,
        ];
        $this->db->where('ID_unit', $id_unit);
        $this->db->update('unit', $data);
    }
    function update_injek($no_ktp)
    {
        $query = $this->db->query("SELECT COUNT(angsuran_ke) as sisa_angsuran FROM angsuran_bulanan WHERE no_ktp='$no_ktp' AND status='0'");
        return $query;
    }
    public function pilih_penjualan($project)
    {
        $query = $this->db->query("SELECT nominal FROM $project WHERE nomor LIKE '14%'");
        return $query;
    }
    public function pilih_hp($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '15%' ");
        return $query;
    }
    public function pilih_biaya_operasional($project)
    {
        $query = $this->db->query("SELECT SUM(nominal) as nominal FROM $project WHERE nomor LIKE '16%'");
        return $query;
    }
    public function pilih_biaya_promo_marketing($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '17%'");
        return $query;
    }
    public function pilih_biaya_sewa_kantor($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '18%'");
        return $query;
    }
    public function pilih_biaya_marketing_fee($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '19%'");
        return $query;
    }
    public function pilih_biaya_listrik($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '20%'");
        return $query;
    }
    public function pilih_biaya_kurir($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '21%'");
        return $query;
    }
    public function pilih_biaya_gaji_karyawan($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '22%'");
        return $query;
    }

    public function pilih_biaya_perijinan($project)
    {
        $query = $this->db->query("SELECT SUM(nominal) as nominal FROM $project WHERE nomor LIKE '23%'");
        return $query;
    }
    public function pilih_biaya_tukang($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '24%'");
        return $query;
    }
    public function pilih_biaya_sewa_mobil($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '25%'");
        return $query;
    }
    public function pilih_biaya_bensin($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '26%'");
        return $query;
    }
    public function pilih_biaya_admin_bank($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '28%'");
        return $query;
    }
    public function pilih_biaya_pendapatan_bunga($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '29%'");
        return $query;
    }
    public function pilih_biaya_entertaiment($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '30%'");
        return $query;
    }
    public function pilih_biaya_donasi($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '31%'");
        return $query;
    }
    public function pilih_biaya_pematangan_lahan($project)
    {
        $query = $this->db->query("SELECT SUM(nominal) as nominal FROM $project WHERE nomor LIKE '32%'");
        return $query;
    }
    public function pilih_biaya_pembangunan($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '33%'");
        return $query;
    }
    public function pilih_biaya_pembebanan($project)
    {
        $query = $this->db->query("SELECT SUM(nominal) as nominal FROM $project WHERE nomor LIKE '35%'");
        return $query;
    }
    public function pilih_biaya_pajak_penghasilan($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '27%'");
        return $query;
    }
    public function pilih_neraca_kas_kecil($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nama ='Kas kecil'");
        return $query;
    }
    public function pilih_neraca_bank($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nama ='Bank'");
        return $query;
    }
    public function pilih_neraca_piutang_usaha($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nama ='Piutang Usaha'");
        return $query;
    }
    public function pilih_neraca_piutang_kredit_rumah($project)
    {
        $query = $this->db->query("SELECT SUM(nominal) as nominal FROM $project WHERE nama ='Piutang Usaha kredit rumah'");
        return $query;
    }
    public function pilih_neraca_piutang_karyawan($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nama ='Piutang Karyawan'");
        return $query;
    }
    public function pilih_neraca_uang_muka($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '5%'");
        return $query;
    }
    public function pilih_neraca_barang_jadi($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nama ='Barang jadi'");
        return $query;
    }
    public function pilih_neraca_pekerjaan_dalam_progress($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nama ='Pekerjaan dalam progress'");
        return $query;
    }
    public function pilih_neraca_tanah_dan_bangunan($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '7%'");
        return $query;
    }
    public function pilih_neraca_peralatan_kantor($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '8%'");
        return $query;
    }

    // LK Pasiva 
    // hutang lancar
    public function pilih_hutangUsaha($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '9%'");
        return $query;
    }
    public function pilih_hutangKonsiyasi($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '10%'");
        return $query;
    }
    public function pilih_hutangLeverensir($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '11%'");
        return $query;
    }
    public function pilih_uangMukaP($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '11a'");
        return $query;
    }
    public function pilih_hutangPemegangSaham($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '12%'");
        return $query;
    }
    // LK Pasiva
    // Modal
    public function pilih_modalDisetor($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '13%'");
        return $query;
    }
    public function pilih_modalAdi($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '13a%'");
        return $query;
    }
    public function pilih_MArief($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '13b%'");
        return $query;
    }
    public function pilih_samsunar($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '13c%'");
        return $query;
    }
    public function pilih_adiDharma($project)
    {
        $query = $this->db->query("SELECT * FROM $project WHERE nomor LIKE '13d%'");
        return $query;
    }
    function updateEmailAngsuranDP($id_dp)
    {
        $this->db->set('status_email', 1);
        $this->db->where('ID_dp', $id_dp);
        $this->db->update('angsuran_dp');
    }
    function updateEmailAngsuranBulanan($id_bulan)
    {
        $this->db->set('status_email', 1);
        $this->db->where('ID_angsuran_bulanan', $id_bulan);
        $this->db->update('angsuran_bulanan');
    }
    function updateEmailAngsuranInjek($id_injek)
    {
        $this->db->set('status_email', 1);
        $this->db->where('ID_injek', $id_injek);
        $this->db->update('angsuran_injek');
    }
}
