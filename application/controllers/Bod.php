<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bod extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keuangan_model', 'keuangan');
        $this->load->model('Marketing_model', 'marketing');
        if ($this->session->userdata('masuk') != TRUE) {
            echo $this->session->set_flashdata('msg', 'Anda Harus Login Terlebih Dahulu !');
            redirect('Auth', 'refresh');
        }
    }

    public function index()
    {
        $title = 'B.O.D - Pengajuan';
        $ktp = $this->uri->segment(3);
        $data = array(
            'title' => $title,
            'query' => $this->marketing->tampilDataPelanggan_bod(),
            'ktpnya' => $ktp,
        );
        $this->template->load('layout/template_v', 'bod/bod', $data);
    }
    public function editpengajuan()
    {
        $title = 'B.O.D - Confirm Pengajuan';
        $ktp = $this->uri->segment(3);
        $data = array(
            'title' => $title,
            'query' => $this->marketing->tampilDataPelanggan_bod(),
            'datacust1' => $this->marketing->tampilDataPelangganpilihan($ktp),
            'ktpnya' => $ktp,
        );
        $this->template->load('layout/template_v', 'bod/editpengajuan', $data);
    }
    public function update_status()
    {
        $bodnote = $this->input->post('bod_note');
        $ktp = $this->input->post('ktp_pengajuan');

        $this->keuangan->update_bod($bodnote, $ktp);
        echo $this->session->set_flashdata('msg', 'success-add-data');
        redirect('bod');
    }
}
