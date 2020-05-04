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
            'query' => $this->db->get('barang_pr'),
        );
        $this->template->load('layout/template_v', 'purchasing/preorder', $data);
    }
    public function change_status()
    {
        $idPr = $this->input->post('ID_pr');
        $status = 1;
        $this->purchasing->change_status($idPr, $status);

        redirect('Purchasing', 'refresh');
    }

    public function delete()
    {
        $id = $this->input->post('ID_pr');
        $this->purchasing->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        }
        redirect('Purchasing', 'refresh');
    }
}
