<?php defined('BASEPATH') or exit('No direct script access allowed');

class Purchasing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Purchasing_model', 'purchasing');
        if ($this->session->userdata('masuk') != TRUE) {
            echo $this->session->set_flashdata('msg', 'Anda Harus Login Terlebih Dahulu !');
            redirect('Auth', 'refresh');
        }
    }

    /**
     * Redirect if needed, otherwise display the user list
     */
    public function index()
    {
        $title = 'Purchasing - Beauty Contest';
        $data = array(
            'title' => $title,
            'query' => $this->db->get_where('barang_pr', array('status' => 0)),
        );
        $this->template->load('layout/template_v', 'purchasing/preorder', $data);
    }

    function status()
    {
        $title = 'Purchasing - Status Preorder';
        $data = array(
            'title' => $title,
            'query' => $this->db->query("SELECT po.dibayar,po.bukti_bayar,po.ID_keuangan,po.ID_po, po.ID_barang_pr,po.status_barang, po.ID_purchasing, po.tanggal_approve, barang_pr.nama_barang, barang_pr.harga_barang, barang_pr.jumlah, barang_pr.total_harga, barang_pr.nama_supplier, barang_pr.waktu_tunggu, barang_pr.jenis_pembayaran, barang_pr.lama_cicilan FROM po JOIN barang_pr ON po.ID_barang_pr=barang_pr.ID_pr"),
        );
        $this->template->load('layout/template_v', 'purchasing/status', $data);
    }

    public function change_status()
    {
        $dariDB = $this->purchasing->cekidpr();
        $nourut = substr($dariDB, 3, 4);
        $kode1 =  $nourut + 1;
        $kodenya = sprintf("%04s", $kode1);
        $strkodenya = 'PO' . $kodenya;

        $id_purchasing = $this->session->userdata('ktp');
        $tanggal = date('d-m-Y');
        $idPr = $this->input->post('ID_pr');
        $status = 1;
        $this->purchasing->change_status($idPr, $status);
        $this->purchasing->tambahPO($strkodenya, $idPr, $id_purchasing, $tanggal);
        echo $this->session->set_flashdata('msg', 'success-add-data');
        redirect('Purchasing', 'refresh');
    }

    public function delete()
    {
        $idPr = $this->input->post('ID_pr');
        $status = 2;
        $this->purchasing->change_status($idPr, $status);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        }
        redirect('Purchasing', 'refresh');
    }

    function terima_barang()
    {
        $idpo = $this->input->post('ID_po');
        $status = "diterima";
        $this->purchasing->terima_barang($idpo, $status);
        redirect('Purchasing/status', 'refresh');
    }
    function return_barang()
    {
    }
}
