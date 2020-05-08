<?php defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

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
    public function addendum()
    {
        $title = 'Keuangan - Addendum';
        $data = array(
            'title' => $title,
            'query1' => $this->db->get('project')->result(),
        );
        $this->template->load('layout/template_v', 'keuangan/addendum', $data);
    }
    public function angsuran()
    {
        $title = 'Keuangan - Bayar Angsuran';
        $data = array(
            'title' => $title,
        );
        $this->template->load('layout/template_v', 'keuangan/angsuran', $data);
    }

    public function bayar_po()
    {
        $title = 'Keuangan - Bayar PO';
        $data = array(
            'title' => $title,
            'query' => $this->keuangan->bayarPO(),
        );
        $this->template->load('layout/template_v', 'keuangan/bayar_po', $data);
    }

    function updatePO()
    {
        $idPr = $this->input->post('ID_po');
        $id_keuangan = $this->session->userdata('ktp');
        $this->keuangan->updatePO($idPr, $id_keuangan);
        echo $this->session->set_flashdata('msg', 'success-add-data');
        redirect('Keuangan/bayar_po');
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
    function rubah_angsuran()
    {
        $ktp        = $_GET['no_ktp_addendum'];
        $data = $this->keuangan->rubah_angsuran($ktp)->result();
        $injek = $this->keuangan->rubah_injek($ktp)->result();
        // foreach ($injek as $i) {
        //     echo "<div class='form-group col-3'>";
        //     echo "<label for='exampleFormControlInput1'>Sisa Angsuran Injek</label>";
        //     echo "<input type='text' class='form-control' id='sisa_angsuran_injek_addendum_angsuran' name='sisa_angsuran_injek_addendum_angsuran' value='$i->nominal' readonly>";
        //     echo "</div>";
        // }
        foreach ($data as $r) {
            echo "<div class='form-group col-3'>";
            echo "<label for='exampleFormControlInput1'>Sisa Angsuran Sebelumnya</label>";
            echo "<input type='text' class='form-control' value='$r->nominal'  id='sisa_angsuran_sebelumnya_addendum' name='sisa_angsuran_sebelumnya_addendum' readonly>";
            echo "</div>";
        }
    }
    function rubah_injek()
    {
        $ktp        = $_GET['no_ktp_addendum'];
        $data = $this->keuangan->rubah_injek($ktp)->result();
        $bulan = $this->keuangan->rubah_angsuran($ktp)->result();
        $lama = $this->keuangan->update_injek($ktp)->result();

        foreach ($data as $r) {
            echo "<div class='form-group col-2'>";
            echo "<label for='exampleFormControlInput1'>Sisa Angsuran Injek</label>";
            echo "<input type='text' class='form-control' id='sisa_angsuran_injek_addendum' name='sisa_angsuran_injek_addendum' value='$r->nominal' readonly>";
            echo "</div>";
        }
        foreach ($bulan as $b) {
            echo "<div class='form-group col-2'>";
            echo "<label for='exampleFormControlInput1'>Sisa Angsuran Pokok</label>";
            echo "<input type='text' class='form-control' id='sisa_angsuran_pokok_addendum' name='sisa_angsuran_pokok_addendum' value='$b->nominal' readonly>";
            echo "</div>";
        }
        foreach ($lama as $l) {
            echo "<div class='form-group col-2'>";
            echo "<label for='exampleFormControlInput1'>Lama angsuran</label>";
            echo "<input type='text' class='form-control' id='lama_angsuran_pokok_addendum' name='lama_angsuran_pokok_addendum' value='$l->sisa_angsuran' readonly>";
            echo "</div>";
        }
    }
    function rubah_unit()
    {
        $ktp        = $_GET['no_ktp_addendum'];
        $data = $this->keuangan->rubah_unit($ktp)->result();

        foreach ($data as $r) {
            echo "<input type='text' class='form-control' id='unit_sebelumnya_addendum' name='unit_sebelumnya_addendum' value='$r->ID_unit' readonly>";
        }
    }
    function pilih_unit()
    {
        $ktp        = $_GET['no_ktp_addendum'];
        $data = $this->keuangan->pilih_unit($ktp)->result();
        echo "<select class='custom-select my-1 mr-sm-2' id='unit_baru_addendum' name='unit_baru_addendum'>";
        echo "<option selected>Pilih Project</option>";
        foreach ($data as $r) {
            echo "<option value='$r->ID_unit'>$r->ID_unit</option>";
        }
        echo "</select>";
    }
    function rubah_project()
    {
        $ktp        = $_GET['no_ktp_addendum'];
        $data = $this->keuangan->rubah_project($ktp)->result();

        foreach ($data as $r) {
            echo "<input type='text' class='form-control' id='project_sebelumnya_addendum' name='project_sebelumnya_addendum' value='$r->ID_project' readonly>";
        }
    }
    function get_unit()
    {
        // Ambil data ID Project yang dikirim via ajax post
        $id_project = $this->input->post('id_project');

        $unit = $this->keuangan->get_unit($id_project);

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>Pilih Unit</option>";

        foreach ($unit as $data) {
            $lists .= "<option value='" . $data->ID_unit . "'>" . 'Nomor : ' . $data->nomor . ' / ' . 'Type : ' . $data->type . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_unit' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    function tambah_addendum()
    {

        $opsinya = $this->input->post('jenis_addendum');
        $no_ktp = $this->input->post('no_ktp_addendum');
        $unit_baru = $this->input->post('unit_baru_addendum');
        $unit_lama = $this->input->post('unit_sebelumnya_addendum');
        $unit_dipilih_project = $this->input->post('unit_baru_project_addendum');
        $project_baru = $this->input->post('project_baru_addendum');
        $project_sebelumnya = $this->input->post('project_sebelumnya_addendum');
        $sisa_angsuran_injek = intval($this->input->post('sisa_angsuran_injek_addendum'));
        $sisa_angsuran_bulanan = intval($this->input->post('sisa_angsuran_pokok_addendum'));
        $sisa_total = $sisa_angsuran_bulanan + $sisa_angsuran_injek;
        $injek_baru = intval($this->input->post('injek_baru_addendum'));
        $lama_injek_baru = intval($this->input->post('lama_injek_baru_addendum'));
        $totalnya = $sisa_total - ($injek_baru * $lama_injek_baru);
        $total_injek = $injek_baru * $lama_injek_baru;

        $lamanya_angsuran = $this->input->post('lama_angsuran_pokok_addendum');
        $total = $totalnya / $lamanya_angsuran;
        $bagi = $total / 1000;
        $dibulatkan = floor($bagi);
        $hasilnya = $dibulatkan * 1000;


        switch ($opsinya) {
            case 'rubah_angsuran':
                //ambil ID data angsuran terbesar
                $dariDB = $this->marketing->cekidangsuranbulanan();
                $nourut = substr($dariDB, 3, 4);
                //mengambil data invoice terbesar
                $dariDB2 = $this->marketing->cekidinvoicebulanan();
                $nourut2 = substr($dariDB2, 3, 4);
                $lama_bulanan = $this->input->post('lama_angsuran_bulanan_addendum');
                $tanggal =     date('d');
                $bulan = date('m');
                $tahun = date('y');
                $nominal_angsuran_bulanan = $this->input->post('angsuran_baru_addendum');
                $sisa_angsuran_sebelumnya = $this->input->post('sisa_angsuran_sebelumnya_addendum');
                $harganya = $sisa_angsuran_sebelumnya;
                $status = 0;
                $this->keuangan->update_addendum_angsuran($no_ktp);

                for ($i = 1; $i <= $lama_bulanan; $i++) {
                    //penentuan ID_angsuran_bulanan + Invoice otomatis
                    $kode1 =  $nourut + 1;
                    $kodenya = sprintf("%04s", $kode1);
                    $strkodenya = 'AB' . $kodenya;
                    $kodeinvoice = $nourut2 + 1;
                    $kodenyainvoice = sprintf("%04s", $kodeinvoice);
                    $strkodeinvoice = "IAB" . $kodenyainvoice;
                    //akhir penentuan ID_angsuran_bulanan + Invoice otomatis
                    $angsuran_ke = $i;        //angsuran ke---
                    $sesudah = $bulan + 1;
                    if ($sesudah > 12) { //jika bulan sudah lebih dari 12 , maka balik lagi menjadi 1
                        $sesudah = 1;
                        $tahun = $tahun + 1; //tahun bertambah jika bulan mencapai 12 dan balik menjadi 1
                    }
                    $sisa_angsuran = $harganya - $nominal_angsuran_bulanan;        //pengurangan sisa angsuran

                    if ($sisa_angsuran < $nominal_angsuran_bulanan) {
                        $nominal_angsuran_bulanan = $harganya;
                        $sisa_angsuran = $harganya - $nominal_angsuran_bulanan;
                    } else {
                        $harganya = $sisa_angsuran;
                    }
                    //sisa angsuran menjadi harga acuan untuk di kurangai angsuran
                    $bulan = $sesudah;                //merubah bulan menjadi bulan yang sudah di tambah
                    $nourut = $kode1;                //merubah nomor urut menjadi yang sudah di tambah
                    $nourut2 = $kodeinvoice;        //merubah invoice  menjadi yang sudah di tambah
                    $this->marketing->proyeksi_angsuran($strkodenya, $no_ktp, $angsuran_ke, $tanggal, $bulan, $tahun, $nominal_angsuran_bulanan, $sisa_angsuran, $status, $strkodeinvoice);
                }
                echo $this->session->set_flashdata('msg', 'success-add-data');
                redirect('Keuangan/addendum');
                break;

            case 'rubah_unit':
                $this->keuangan->update_addendum_unit_dipesan($no_ktp, $unit_baru);
                $this->keuangan->update_addendum_unit($unit_lama);
                $this->keuangan->update_addendum_unit_tambah($unit_baru);
                echo $this->session->set_flashdata('msg', 'success-add-data');
                redirect('Keuangan/addendum');
                break;
            case 'rubah_project':
                $this->keuangan->update_addendum_project($no_ktp, $unit_dipilih_project, $project_baru, $project_sebelumnya);
                echo $this->session->set_flashdata('msg', 'success-add-data');
                redirect('Keuangan/addendum');
                break;

            case 'rubah_injek':
                //ambil ID data angsuran injek
                $dariDB5 = $this->marketing->cekidinjek();
                $nourut5 = substr($dariDB5, 3, 4);
                //mengambil data invoice terbesar injek
                $dariDB6 = $this->marketing->cekidinvoiceinjek();
                $nourut6 = substr($dariDB6, 3, 4);
                $this->keuangan->update_addendum_angsuran($no_ktp);
                $this->keuangan->update_addendum_injek($no_ktp);
                $tanggal =     date('d');
                $bulan = date('m');
                $tahun = date('y');
                $status = 0;
                for ($i = 1; $i <= $lama_injek_baru; $i++) {
                    //penentuan ID_angsuran_bulanan + Invoice otomatis

                    $kode1 =  $nourut5 + 1;
                    $kodenya = sprintf("%04s", $kode1);
                    $strkodenya = 'AIJ' . $kodenya;
                    $kodeinvoice = $nourut6 + 1;
                    $kodenyainvoice = sprintf("%04s", $kodeinvoice);
                    $strkodeinvoice = "IIJ" . $kodenyainvoice;
                    $nourut5 = $kode1;                //merubah nomor urut menjadi yang sudah di tambah
                    $nourut6 = $kodeinvoice;        //merubah invoice  menjadi yang sudah di tambah
                    $angsuran_ke = $i;

                    $sisa_angsuran = $total_injek - $injek_baru;
                    $tahunnya = $tahun + 1;
                    $tahun = $tahunnya;
                    $this->marketing->proyeksi_angsuran_injek($strkodenya, $no_ktp, $angsuran_ke, $tanggal, $bulan, $tahunnya, $injek_baru, $sisa_angsuran, $status, $strkodeinvoice);
                    $total_injek = $sisa_angsuran;
                }
                for ($i = 1; $i <= $lamanya_angsuran; $i++) {
                    //ambil ID data angsuran terbesar
                    $dariDB = $this->marketing->cekidangsuranbulanan();
                    $nourut = substr($dariDB, 3, 4);
                    //mengambil data invoice terbesar
                    $dariDB2 = $this->marketing->cekidinvoicebulanan();
                    $nourut2 = substr($dariDB2, 3, 4);
                    //penentuan ID_angsuran_bulanan + Invoice otomatis
                    $kode1 =  $nourut + 1;
                    $kodenya = sprintf("%04s", $kode1);
                    $strkodenya = 'AB' . $kodenya;
                    $kodeinvoice = $nourut2 + 1;
                    $kodenyainvoice = sprintf("%04s", $kodeinvoice);
                    $strkodeinvoice = "IAB" . $kodenyainvoice;
                    //akhir penentuan ID_angsuran_bulanan + Invoice otomatis
                    $angsuran_ke = $i;        //angsuran ke---
                    $sesudah = $bulan + 1;
                    if ($sesudah > 12) { //jika bulan sudah lebih dari 12 , maka balik lagi menjadi 1
                        $sesudah = 1;
                        $tahun = $tahun + 1; //tahun bertambah jika bulan mencapai 12 dan balik menjadi 1
                    }
                    $sisa_angsuran = $totalnya - $hasilnya;        //pengurangan sisa angsuran

                    if ($sisa_angsuran < $hasilnya) {
                        $hasilnya = $totalnya;
                        $sisa_angsuran = $totalnya - $hasilnya;
                    } else {
                        $totalnya = $sisa_angsuran;
                    }
                    //sisa angsuran menjadi harga acuan untuk di kurangai angsuran
                    $bulan = $sesudah;                //merubah bulan menjadi bulan yang sudah di tambah
                    $nourut = $kode1;                //merubah nomor urut menjadi yang sudah di tambah
                    $nourut2 = $kodeinvoice;        //merubah invoice  menjadi yang sudah di tambah
                    $this->marketing->proyeksi_angsuran($strkodenya, $no_ktp, $angsuran_ke, $tanggal, $bulan, $tahun, $hasilnya, $sisa_angsuran, $status, $strkodeinvoice);
                }
                echo $this->session->set_flashdata('msg', 'success-add-data');
                redirect('Keuangan/addendum');
                break;
        }
    }
}
