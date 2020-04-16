<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Keuangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keuangan_model', 'keuangan');
        if ($this->session->userdata('masuk') != TRUE) {
            echo $this->session->set_flashdata('msg', 'Anda Harus Login Terlebih Dahulu !');
            redirect('Auth', 'refresh');
        } else {
            $title = 'Keuangan';
            $data = array(
                'title' => $title,
                'query' => $this->keuangan->tampilDataGL(),
            );
            $this->template->load('layout/template_v', 'keuangan/general_ledger', $data);
        }
    }

    /**
     * Redirect if needed, otherwise display the user list
     */
    public function index()
    {
    }

    public function tambahgl()
    {
        $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim|is_unique[general_ledger.nomor]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim');

        if ($this->form_validation->run() == false) {
            echo $this->session->set_flashdata('msg', 'error-register');
            redirect('Home/keuangan', 'refresh');
        } else {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'nama' => $this->input->post('nama'),
                'nominal' => $this->input->post('nominal')
            ];
            $this->keuangan->simpanDataGL($data);
            echo $this->session->set_flashdata('msg', 'success-add-data');
            redirect('Home/keuangan');
        }
    }
}
