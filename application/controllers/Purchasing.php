<?php defined('BASEPATH') or exit('No direct script access allowed');

class Purchasing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('purchasing_model', 'purchasing');
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
            'query' => $this->db->get('barang_pr'),
        );
        $this->template->load('layout/template_v', 'purchasing/preorder', $data);
    }
}
