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
        $title = 'Keuangan - General Ledger';
        $data = array(
            'title' => $title,
            'query' => $this->db->get_where('barang_pr', array('status' => 0)),
        );
        $this->template->load('layout/template_v', 'purchasing/preorder', $data);
    }
    public function change_status()
    {
        $dariDB = $this->purchasing->cekidpr();
        $nourut = substr($dariDB, 3, 4);
        $kode1 =  $nourut + 1;
        $kodenya = sprintf("%04s", $kode1);
        $strkodenya = 'PO' . $kodenya;

        $dariDB1 = $this->purchasing->cekidbayarpo();
        $nourut1 = substr($dariDB1, 3, 4);
        $kode2 =  $nourut1 + 1;
        $kodenya1 = sprintf("%04s", $kode2);
        $strkodenya1 = 'BPO' . $kodenya1;
        $id_purchasing = $this->session->userdata('ktp');
        $tanggal = date('d-m-Y');
        $idPr = $this->input->post('ID_pr');
        $status = 1;
        $this->purchasing->change_status($idPr, $status);
        $this->purchasing->tambahPO($strkodenya, $idPr, $id_purchasing, $tanggal, $strkodenya1);
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
}
