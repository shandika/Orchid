<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Pm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pm_model', 'model');
        $this->load->model('Purchasing_model', 'purchasing');
        if ($this->session->userdata('masuk') != TRUE) {
            echo $this->session->set_flashdata('msg', 'Anda Harus Login Terlebih Dahulu !');
            redirect('Auth', 'refresh');
        }
    }

    public function index()
    {
        // id project
        $dariDB = $this->model->cekidproject();
        $nourut = substr($dariDB, 3, 4);
        $kode1 =  $nourut + 1;
        $kodenya = sprintf("%04s", $kode1);
        $strkodenya = 'PJ' . $kodenya;

        $title = 'Project Manager - Project';
        $data = array(
            'title' => $title,
            'project' => $this->model->getAll(),
            'idP' => $strkodenya
        );
        $this->template->load('layout/template_v', 'pm/dashboard_v', $data);
    }

    public function PR()
    {
        // $sql = "SELECT unit_dipesan.ID_unit_dipesan, unit_dipesan.ID_unit, unit_dipesan.no_ktp, customer.nama, 
        // unit.ID_project, project.nama, project.alamat, project.deskripsi FROM unit_dipesan JOIN customer ON unit_dipesan.no_ktp = customer.no_ktp 
        // JOIN unit ON unit_dipesan.ID_unit = unit.ID_unit JOIN project ON unit.ID_project = project.ID_project";

        //tampil ID_unit_dipesan
        $this->db->select('unit_dipesan.ID_unit_dipesan, unit_dipesan.ID_unit, unit_dipesan.no_ktp, customer.nama AS namanya, 
        unit.ID_project, project.nama, project.alamat, project.deskripsi');
        $this->db->from('unit_dipesan');
        $this->db->join('customer', 'unit_dipesan.no_ktp = customer.no_ktp ');
        $this->db->join('unit', 'unit_dipesan.ID_unit = unit.ID_unit');
        $this->db->join('project', 'unit.ID_project = project.ID_project');


        //ID_PR otomatis
        //ID_PR OTOMATIS
        $dariDB = $this->model->cekidpr();
        $nourut = substr($dariDB, 3, 4);
        $kode1 =  $nourut + 1;
        $kodenya = sprintf("%04s", $kode1);
        $strkodenya = 'PR' . $kodenya;

        $title = 'Project Manager - Purchasing Request';
        $data = array(
            'title' => $title,
            'query1' => $this->db->get()->result(),
            'idpr'     => $strkodenya,
        );

        $this->template->load('layout/template_v', 'pm/pr', $data);
    }
    public function delete()
    {
        $id = $this->input->post('ID_project');
        // $namaGl = $this->input->post('nama_gl');
        $this->model->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        }
        redirect('Home/pm', 'refresh');
    }

    public function tambahDataProject()
    {
        $config['upload_path'] = './assets/images/project/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {

            if ($this->upload->do_upload('foto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/project/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = 600;
                $config['height'] = 500;
                $config['new_image'] = './assets/images/project/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar             = $gbr['file_name'];

                $idprojct           = strip_tags($this->input->post('ID_project'));
                $nama               = strip_tags($this->input->post('nama'));
                $namagl             = str_replace(' ', '', $nama);
                $namagl2            = strtolower($namagl);
                $alamat             = strip_tags($this->input->post('alamat'));
                $deskripsi          = strip_tags($this->input->post('deskripsi'));
                $foto               = $gambar;
                $jmlUnit            = strip_tags($this->input->post('jumlah_unit'));
                $unitKosong         = strip_tags($this->input->post('unit_kosong'));
                $unitIsi            = strip_tags($this->input->post('unit_isi'));
                $nama_gl            = "general_ledger_$namagl2";
                $data = [
                    'ID_project'    => $idprojct,
                    'nama'          => $nama,
                    'alamat'        => $alamat,
                    'deskripsi'     => $deskripsi,
                    'foto'          => $foto,
                    'jumlah_unit'   => $jmlUnit,
                    'unit_kosong'   => $unitKosong,
                    'unit_isi'     => $unitIsi,
                    'unit_isi'      => $unitIsi,
                    'nama_gl'       => $nama_gl,
                ];
                $this->form_validation->set_rules('ID_project', 'ID_project', 'required');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
                $sql = "CREATE TABLE general_ledger_" . $namagl2 . "(
                    nomor   VARCHAR(5) NOT NULL PRIMARY KEY
                   ,nama    VARCHAR(46)
                   ,nominal VARCHAR(17) NOT NULL
                 );";
                $sql_insert = "INSERT INTO general_ledger_" . $namagl2 . "(nomor,nama,nominal) VALUES ('1','Kas kecil','0'),
                 ('2','Bank','0'),
                 ('3','Piutang Usaha','0'),
                 ('4','Piutang Usaha kredit rumah','0'),
                 ('4a','Piutang Karyawan','0'),
                 ('5','Uang Muka Pembelian','0'),
                 ('6','Persediaan','0'),
                 ('6a','Barang jadi','0'),
                 ('6b','Pekerjaan dalam progress','0'),
                 ('7','Tanah dan Bangunan','0'),
                 ('8','Inventaris Kantor','0'),
                 ('9','Hutang Usaha','0'),
                 ('10','Hutang Konsiyasi','0'),
                 ('11','Hutang Leverensir','0'),
                 ('11a','Uang Muka Penjualan','0'),
                 ('12','Share Holder loan','0'),
                 ('12a','Share Holder loan Adi Dharma','0'),
                 ('12b','Share Holder loan johanes','0'),
                 ('12c','Share Holder loan Ririn','0'),
                 ('13','Modal disetor','0'),
                 ('13a','Modal Adi','0'),
                 ('13b','Mohammad Arief','0'),
                 ('13c','Samsunar','0'),
                 ('13d','Adi Dharma','0'),
                 ('14','Penjualan','0'),
                 ('15','Biaya pokok penjualan','0'),
                 ('16','Biaya Operasional Kantor','0'),
                 ('16a','Tagihan listrik, Air, Telp, mobil, Belanja ATK & Rumah Tangga','0'),
                 ('16b','Petty Cash','0'),
                 ('16c','Medical Karyawan','0'),
                 ('17','Biaya Promosi/Marketing','0'),
                 ('18','Biaya sewa kantor','0'),
                 ('19','Marketing Fee','0'),
                 ('20','Biaya listrik','0'),
                 ('21','Biaya kurir','0'),
                 ('22','Biaya Gaji','0'),
                 ('23','Biaya Perijinan','0'),
                 ('23a','Biaya Pembuatan PT','0'),
                 ('23b','Rekomendasi Kel/Kecamatan/RW/RT','0'),
                 ('23c','Ijin Pemanfaatan tanah (IPT)','0'),
                 ('23d','Rekom Gubernur','0'),
                 ('23e','Blok Plan','0'),
                 ('23f','Kompensasi Lingkungan','0'),
                 ('23g','Biaya Notaris','0'),
                 ('23h','Biaya PBB Lahan','0'),
                 ('24','Biaya Tukang','0'),
                 ('25','Biaya Sewa Mobil','0'),
                 ('26','Biaya Bensin,toll dan parkir','0'),
                 ('27','Biaya Pajak','0'),
                 ('28','Biaya Admin Bank','0'),
                 ('29','Pendapatan Bunga','0'),
                 ('30','Entertainment','0'),
                 ('31','Biaya Donasi dan sumbangan','0'),
                 ('32','Biaya Pematangan Lahan','0'),
                 ('32a','Infrastruktur','0'),
                 ('32a1','Pembersihan lahan','0'),
                 ('32a2','Cut & Fill (Pembentukan badan jalan & kavling)','0'),
                 ('32a3','Gerbang Masuk/Pos Jaga','0'),
                 ('32a4','Merk Perumahan','0'),
                 ('32a5','Pagar Beton Keliling','0'),
                 ('32a6','Pekerjaan Saluran Air Kotor','0'),
                 ('32a7','Pembuatan taman','0'),
                 ('32a8','Pemasangan Kansteen','0'),
                 ('32a9','Resapan Komunal','0'),
                 ('32a10','Pengerjaan DPT','0'),
                 ('32a11','Pengerasan dan Pembuatan jalan','0'),
                 ('32a12','Pembuatan instalasi PLN','0'),
                 ('32a13','Pembuatan Jembatan','0'),
                 ('32a14','Pemasangan Paving Block','0'),
                 ('32b','Utilitas Penerangan Umum','0'),
                 ('32c','Fasos/Fasum','0'),
                 ('32c1','Sarana Ibadah (Mushola)','0'),
                 ('32c2','Play Ground','0'),
                 ('32c3','Kompensasi Tanah Makam','0'),
                 ('32c4','Pembuatan Direksi Kit & Gudang','0'),
                 ('32d','Pemeliharaan dan Pembinaan Lingkungan','0'),
                 ('32d1','Pembinaan Lingkungan (Polsek, Preman)','0'),
                 ('32d2','Petugas Kebersihan Sampah','0'),
                 ('32d3','Petugas Keamanan','0'),
                 ('33','Biaya Pembangunan','0'),
                 ('35','Biaya Pembebanan Per Unit','0'),
                 ('35a','Biaya Sambung PDAM','0'),
                 ('35b','Biaya Sambung Listrik (PLN/rumah)','0'),
                 ('35c','Biaya Sambung Air Bersih (Pompa listrik)','0'),
                 ('35d','Biaya Splitsing Sertipikat','0'),
                 ('35e','Biaya IMB (incl. Retribusinya)','0'),
                 ('35f','Biaya Maintenance (sebelum STB)','0'),
                 ('35g','Biaya Pembuatan Taman Halaman Depan','0'),
                 ('35h','Pagar pembatas kavling','0'),
                 ('35i','Peningkatan hak AJB ke SHM','0');";

                $this->model->tambahDataProject($data);
                $this->db->query($sql);
                $this->db->query($sql_insert);

                redirect('Home/pm');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal ditambahkan</div>');
            redirect('Pm', 'refresh');
        }
    }


    public function edit($id)
    {
        $where = array('ID_project' => $id);
        $title = 'Edit Project';
        $data = array(
            'title' => $title,
            'project' => $this->model->edit_data($where, 'project')->result()
        );

        $this->template->load('layout/template_v', 'pm/edit_v', $data);
    }
    public function update()
    {

        $idProject = $this->input->post('ID_project');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $deskripsi = $this->input->post('deskripsi');
        $jmlUnit = $this->input->post('jumlah_unit');
        $unitkosong = $this->input->post('unit_kosong');
        $unitIsi = $this->input->post('unit_isi');
        $foto_lama = $this->input->post('foto_lama');


        // cek jika ada gambar
        $upload_foto = $_FILES['foto']['name'];

        if ($upload_foto) {
            $config['upload_path'] = './assets/images/project/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {

                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/project/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 500;
                    $config['new_image'] = './assets/images/project/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    unlink('assets/images/project/' . $foto_lama);
                    $gambarBaru       = $gbr['file_name'];
                    $this->db->set('foto', $gambarBaru);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gambar Gagal upload</div>');
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hanya tambahkan file gambar</div>');
        }
        $this->db->set('unit_isi', $unitIsi);
        $this->db->set('unit_kosong', $unitkosong);
        $this->db->set('jumlah_unit', $jmlUnit);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('alamat', $alamat);
        $this->db->set('nama', $nama);
        $this->db->where('ID_project', $idProject);
        $this->db->update('project');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
        redirect('Pm', 'refresh');
    }

    public function backPm()
    {
        $title = 'Project Manager - Project';
        $data = array(
            'title' => $title,
            'project' => $this->model->getAll()
        );
        $this->template->load('layout/template_v', 'pm/dashboard_v', $data);
    }

    public function search()
    {
        $title = 'Home - Project';
        $keywoard = $this->input->post('key');
        $data = array(
            'title' => $title,
            'project' => $this->model->get_keywoard($keywoard)
        );

        $this->template->load('layout/template_v', 'pm/dashboard_v', $data);
    }

    public function tambahpr()
    {
        $id_pr = $this->input->post('ID_pr');
        $id_ud = $this->input->post('ID_unit_dipesan_pr');
        $nama_barang = $this->input->post('nama_barang_pr');
        $harga_barang = $this->input->post('harga_barang_pr');
        $jumlah_barang_pr = $this->input->post('jumlah_barang_pr');
        $total_harga = $harga_barang * $jumlah_barang_pr;
        $nama_supplier_pr = $this->input->post('nama_supplier_pr');
        $jenis_bayar_pr = $this->input->post('jenis_bayar_pr');
        $lama_bayar_pr = $this->input->post('lama_bayar_pr');
        $waktu_tunggu_pr = $this->input->post('waktu_tunggu_pr');
        $waktu2 = $this->input->post('satuan_waktu_tunggu_pr');
        $waktu_tunggunya = $waktu_tunggu_pr . " " . $waktu2;
        $status = 0;
        $tanggal = date('d-m-Y');
        $id_pm = $this->session->userdata('ktp');
        if ($lama_bayar_pr == null) {
            $lama_bayar_pr = 0;
        }
        $cicil = intval($lama_bayar_pr);
        if ($lama_bayar_pr > 0) {
            $cicilannya = $total_harga / 3;
            $dibagi = $cicilannya / 1000;
            $dibulatkan = floor($dibagi);
            $hasilnya = $dibulatkan * 1000;
            for ($i = 1; $i <= $lama_bayar_pr; $i++) {
                // ID_ANGSURAN_BARANG_OTOMATIS
                $dariDB = $this->model->cekidangsuranbarangpr();
                $nourut1 = substr($dariDB, 3, 4);
                $kode2 =  $nourut1 + 1;
                $kodenya1 = sprintf("%04s", $kode2);
                $strkodenya1 = 'APR' . $kodenya1;



                $sisanya = $total_harga - $hasilnya;
                if ($sisanya < $hasilnya) {
                    $hasilnya = $total_harga;
                    $sisanya = $total_harga - $hasilnya;
                } else {
                    $total_harga = $sisanya;
                }
                $nourut1 = $kode2;
                $this->model->cicilanpr($strkodenya1, $i, $hasilnya, $sisanya, 0, $id_pr);
            }
        }

        $this->model->simpanpr($id_pr, $id_ud, $nama_barang, $harga_barang, $jumlah_barang_pr, $total_harga, $nama_supplier_pr, $jenis_bayar_pr, $lama_bayar_pr, $waktu_tunggunya, $status, $tanggal, $id_pm);
        echo $this->session->set_flashdata('msg', 'success-add-data');
        redirect('Pm/PR', 'refresh');
    }

    public function tambahUnitView($id)
    {
        $where = array('ID_project' => $id);
        $title = 'Tambah Unit';
        $data = array(
            'title' => $title,
            'project' => $this->model->edit_data($where, 'project')->result()
        );
        $this->template->load('layout/template_v', 'pm/tambahUnit_v', $data);
    }

    public function simpanDataUnit()
    {
        $dariDB = $this->model->cekIdUnit();
        $nourut = substr($dariDB, 3, 4);
        $jumlahnya = intval($this->input->post('jumlah'));
        $idProject = $this->input->post('idProject');
        $nomor = $this->input->post('nomor');
        $type = $this->input->post('type');
        $luasB = $this->input->post('luasBangunan');
        $luasT = $this->input->post('luasTanah');


        for ($i = 1; $i <= $jumlahnya; $i++) {
            $kode1 =  $nourut + 1;
            $kodenya = sprintf("%04s", $kode1);
            $strkodenya = 'UN' . $kodenya;
            $idUnit = $strkodenya;
            $nomornya = $nomor . $i;
            $this->model->simpanDataUnit($idUnit, $idProject, $nomornya, $type, $luasB, $luasT);
            $nourut = $kode1;
        }


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil Disimpan</div>');
        redirect('Pm', 'refresh');
    }

    function terima_barang()
    {
        $title = 'Project Manager - Status Barang';
        $data = array(
            'title' => $title,
            'query' => $this->db->query("SELECT po.dibayar,po.bukti_bayar,po.ID_keuangan,po.ID_po, po.ID_barang_pr,po.status_barang, po.ID_purchasing, po.tanggal_approve, barang_pr.nama_barang, barang_pr.harga_barang, barang_pr.jumlah, barang_pr.total_harga, barang_pr.nama_supplier, barang_pr.waktu_tunggu, barang_pr.jenis_pembayaran, barang_pr.lama_cicilan FROM po JOIN barang_pr ON po.ID_barang_pr=barang_pr.ID_pr"),
        );
        $this->template->load('layout/template_v', 'pm/terima_barang', $data);
    }
    function terima_barang_button()
    {
        $idpo = $this->input->post('ID_po');
        $status = "Di Terima";
        $this->purchasing->terima_barang($idpo, $status);
        redirect('pm/terima_barang', 'refresh');
    }
    function return_barang_button()
    {
        $idpo = $this->input->post('ID_po');
        $status = "Return";
        $this->purchasing->terima_barang($idpo, $status);
        redirect('pm/terima_barang', 'refresh');
    }
    function get_pr()
    {
        if (isset($_GET['term'])) {
            $result = $this->model->search_barang_pr($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama_barang,
                    );
                echo json_encode($arr_result);
            }
        }
    }
}
