<?php defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keuangan_model', 'keuangan');
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
            'query' => $this->keuangan->tampilDataGL(),
            'query2' => $this->db->get('project')->result(),
        );
        $this->template->load('layout/template_v', 'keuangan/general_ledger', $data);
    }

    public function journal()
    {
        $title = 'Keuangan - Journal';
        $data = array(
            'title' => $title,
            'query1' => $this->db->get('project')->result(),
        );
        $this->template->load('layout/template_v', 'keuangan/journal', $data);
    }
    public function angsuran()
    {
        $title = 'Keuangan - Bayar Angsuran';
        $data = array(
            'title' => $title,
        );
        $this->template->load('layout/template_v', 'keuangan/angsuran', $data);
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
            $namagl = $this->input->post('project_GL');
            $data = [
                'nomor' => $this->input->post('nomor'),
                'nama' => $this->input->post('nama'),
                'nominal' => $this->input->post('nominal')
            ];
            $this->keuangan->simpanDataGL($data, $namagl);
            echo $this->session->set_flashdata('msg', 'success-add-data');
            redirect('Home/keuangan');
        }
    }
    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->keuangan->search_cust($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama,
                        'no_ktp' => $row->no_ktp,
                        'id_invoice' => $row->ID_invoice_dp,
                        'id_angsuran' => $row->ID_dp,
                        'nominal_pembayaran' => $row->nominal_angsuran_dp,
                    );
                echo json_encode($arr_result);
            } else {
                $res = $this->keuangan->search_bulanan($_GET['term']);
                if (count($res) > 0) {
                    foreach ($res as $row)
                        $arr_result[] = array(
                            'label' => $row->nama,
                            'no_ktp' => $row->no_ktp,
                            'id_invoice' => $row->ID_invoice_angsuran_bulanan,
                            'id_angsuran' => $row->ID_angsuran_bulanan,
                            'nominal_pembayaran' => $row->nominal_angsuran_bulanan,
                        );
                    echo json_encode($arr_result);
                }
            }
        }
    }

    function get_gl()
    {
        if (isset($_GET['term'])) {
            $result = $this->keuangan->search_gl($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama,
                        'nomor' => $row->nomor,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    function tambahjournal()
    {


        $id_project = $this->input->post('project_journal');
        $nomor_gl = $this->input->post('nomor_gl');
        $nomor_gl2 = $this->input->post('nomor_gl2');
        $nama_gl = $this->input->post('nama_gl');
        $nama_gl2 = $this->input->post('nama_gl2');
        $debit = $this->input->post('debit_journal');
        $kredit = $this->input->post('kredit_journal');
        $keterangan = $this->input->post('keterangan_journal');
        $tanggal = date("d/m/Y");
        $pembanding = 2;

        //get nama gl
        $dbnya = $this->keuangan->ceknamagl($id_project);

        //ambil ID data journal terbesar
        $dariDB = $this->keuangan->cekidjournal();
        $nourut = substr($dariDB, 3, 4);
        $kode1 =  $nourut + 1;
        $kodenya = sprintf("%04s", $kode1);
        $strkodenya = 'IJN' . $kodenya;

        //ceksaldo
        $dariDB2 = $this->keuangan->ceksaldo($nomor_gl, $dbnya);
        $debitnya = intval($dariDB2) + $debit;
        $this->keuangan->tambahjournal($strkodenya, $nomor_gl, $nama_gl, $debit, "0", $keterangan, $tanggal, $id_project, $debitnya, $dbnya);

        //ambil ID data journal terbesar
        $dariDB = $this->keuangan->cekidjournal();
        $nourut = substr($dariDB, 3, 4);
        $kode1 =  $nourut + 1;
        $kodenya = sprintf("%04s", $kode1);
        $strkodenya = 'IJN' . $kodenya;


        if ($nama_gl2 == "Bank") {
            $dariDB2 = $this->keuangan->ceksaldo($nomor_gl2, $dbnya);
            $kreditnya = intval($dariDB2) - $kredit;
        } else {
            $dariDB2 = $this->keuangan->ceksaldo($nomor_gl2, $dbnya);
            $kreditnya = intval($dariDB2) + $kredit;
        }

        $this->form_validation->set_rules('project_journal', 'Project Journal', 'required|trim');
        $this->form_validation->set_rules('nomor_gl', 'Nomor General Ledger', 'required|trim');
        $this->form_validation->set_rules('nomor_gl2', 'Nomor General Ledger 2', 'required|trim');
        $this->form_validation->set_rules('nama_gl', 'Nama General Ledger', 'required|trim');
        $this->form_validation->set_rules('nama_gl2', 'Nama General Ledger 2', 'required|trim');
        $this->form_validation->set_rules('debit_journal', 'Debit Journal', 'required|trim');
        $this->form_validation->set_rules('kredit_journal', 'Kredit Journal', 'required|trim');
        $this->form_validation->set_rules('keterangan_journal', 'Keterangan Journal', 'required|trim');


        $query = $this->keuangan->tambahjournal($strkodenya, $nomor_gl2, $nama_gl2, "0", $kredit, $keterangan, $tanggal, $id_project, $kreditnya, $dbnya);

        echo $this->session->set_flashdata('msg', 'success-add-data');
        redirect('Keuangan/journal');
    }

    function tambahangsuran()
    {
        $idinvoice = $this->input->post('id_invoice');
        $idbayar = $this->input->post('id_angsuran');
        $tanggal_bayar = date('d-m-Y');
        $nominal = $this->input->post('nominal_pembayaran');
        $type = $this->input->post('type_bayar_angsuran');
        $nama_bank = $this->input->post('nama_bank_angsuran');
        $nomor_bank = $this->input->post('nomor_bank_angsuran');

        $this->form_validation->set_rules('id_invoice', 'ID Invoice Angsuran', 'required|trim');
        $this->form_validation->set_rules('id_angsuran', 'ID Angsuran', 'required|trim');
        $this->form_validation->set_rules('nominal_pembayaran', 'Nominal Pembayran', 'required|trim');
        $this->form_validation->set_rules('type_bayar_angsuran', 'Type Bayar Angsuran', 'required|trim');
        // $this->form_validation->set_rules('nama_bank_angsuran', 'Nama BANK Angsuran', 'required|trim');
        // $this->form_validation->set_rules('nomor_bank_angsuran', 'Nomor BANK Angsuran', 'required|trim');
        if ($this->form_validation->run() == false) {
            echo $this->session->set_flashdata('msg', 'error-register');
            redirect('Keuangan/angsuran');
        } else {
            $query = $this->keuangan->bayarangsuran($idinvoice, $idbayar, $tanggal_bayar, $nominal, $type, $nama_bank, $nomor_bank);
            echo $this->session->set_flashdata('msg', 'success-add-data');
            redirect('Keuangan/angsuran');
        }
    }

    function sort_gl()
    {
        $project        =  $_GET['project_GL'];
        $data           =  $this->db->get($project)->result();
        echo "<tr><th>Nomor GL</th><th>Nama GL</th><th>Nominal GL</th>";
        foreach ($data as $r) {

            echo "<tr>
                <td>" .  strtoupper($r->nomor) . "</td>
                <td>" .  strtoupper($r->nama) . "</td>
                <td>" .  strtoupper($r->nominal) . "</td>";

            echo "</tr>";
        }
    }
    function sort_gl_utama()
    {
        $data = $this->db->get('general_ledger')->result();
        echo "<tr><th>Nomor GL</th><th>Nama GL</th><th>Nominal GL</th>";
        foreach ($data as $r) {

            echo "<tr>
                <td>" .  strtoupper($r->nomor) . "</td>
                <td>" .  strtoupper($r->nama) . "</td>
                <td>" .  strtoupper($r->nominal) . "</td>";

            echo "</tr>";
        }
    }
}
