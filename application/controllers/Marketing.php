<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Marketing extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
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
		$title = 'Home';
		$data = array(
			'title' => $title,
			'query' => $this->marketing->tampilDataPelanggan(),
		);
		$this->template->load('layout/template_v', 'marketing/dashboard_v', $data);
	}
	public function editdata()
	{
		$title = 'Royal Orchid Syariah - Edit Data Customer';
		$ktp = $this->uri->segment(3);
		$data = array(
			'title' => $title,
			'query' => $this->marketing->tampilDataPelanggan(),
			'query1' => $this->marketing->tampilDataAngsuranLain($ktp),
			'datacust1' => $this->marketing->tampilDataPelangganpilihan($ktp),
			'dataajuan' => $this->marketing->tampildataajuan($ktp),
			'gambar' => $this->marketing->tampilgambar($ktp),
		);
		$this->template->load('layout/template_v', 'marketing/editdata', $data);
	}

	public function simpanDataPelanggan()
	{
		$this->load->library('upload');
		$dataInfo = array();
		$files = $_FILES;
		$cpt = count($_FILES['userfile']['name']);
		for ($i = 0; $i < $cpt; $i++) {
			$_FILES['userfile']['name'] = $files['userfile']['name'][$i];
			$_FILES['userfile']['type'] = $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['error'] = $files['userfile']['error'][$i];
			$_FILES['userfile']['size'] = $files['userfile']['size'][$i];

			//upload an image options
			$config = array();
			$config['upload_path'] = './assets/images/dokumen_pelengkap/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']      = '0';
			$config['overwrite']     = FALSE;
			$new_filename = time() . $_FILES['userfile']['name'][$i];
			$config['file_name'] = $new_filename;

			$this->upload->initialize($config);
			$this->upload->do_upload();
			$dataInfo[] = $this->upload->data();
		}

		$gambar = array(
			'no_ktp'					=> strip_tags($this->input->post('noktp')),
			'fc_ktp' 								=> $dataInfo[0]['file_name'],
			'fc_kk' 								=> $dataInfo[1]['file_name'],
			'slip_gaji' 							=> $dataInfo[2]['file_name'],
			'laporan_keuangan_usaha' 				=> $dataInfo[3]['file_name'],
			'laporan_rekening' 						=> $dataInfo[4]['file_name'],
			'surat_persetujuan_suami_istri' 		=> $dataInfo[5]['file_name'],
			'surat_persetujuan_pembayaran_kredit' 	=> $dataInfo[6]['file_name'],
			'surat_rekomendasi' 					=> $dataInfo[7]['file_name'],
			'surat_perjanjian_agunan_barang' 		=> $dataInfo[8]['file_name'],
			'surat_perjanjian_penjaminan_personal' 	=> $dataInfo[9]['file_name'],
			'slip_gaji_penjamin_personal' 			=> $dataInfo[10]['file_name']

		);


		$data = array(
			'no_ktp'					=> strip_tags($this->input->post('noktp')),
			'nama'						=> strip_tags($this->input->post('nama')),
			'pekerjaan_sesuai_ktp'		=> strip_tags($this->input->post('pekerjaan')),
			'tempat_tanggal_lahir'		=> strip_tags($this->input->post('ttl')),
			'status'					=> strip_tags($this->input->post('status')),
			'jumlah_tanggungan'			=> strip_tags($this->input->post('jmltanggungan')),
			'alamat'					=> strip_tags($this->input->post('alamat')),
			'no_telepon'				=> strip_tags($this->input->post('notlp')),
			'email'						=> strip_tags($this->input->post('email')),
			'status_rumah'				=> strip_tags($this->input->post('stsrumah')),
			'lama_menetap'				=> strip_tags($this->input->post('lmmenetap')),
			'pekerjaan'					=> strip_tags($this->input->post('pekerjaan')),
			'lama_bekerja'				=> strip_tags($this->input->post('lmbekerja')),
			'nama_tempat_bekerja'		=> strip_tags($this->input->post('nmtpbekerja')),
			'alamat_tempat_bekerja'		=> strip_tags($this->input->post('altpbekerja')),
			'income_bulanan'			=> filter_var($this->input->post('inbulanan'), FILTER_SANITIZE_NUMBER_INT),
			'income_bulanan_pasangan'	=> filter_var($this->input->post('inblnpasangan'), FILTER_SANITIZE_NUMBER_INT),
			'no_rekening'				=> strip_tags($this->input->post('norek')),
			'nama_kontak_darurat'		=> strip_tags($this->input->post('nmktdarurat')),
			'alamat_kontak_darurat'		=> strip_tags($this->input->post('alktdarurat')),
			'nomor_kontak_darurat'		=> strip_tags($this->input->post('noktdarurat')),
			'status_akad'				=> '0',
		);
		$config['upload_path'] = './assets/images/dokumen_pelengkap/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		$this->load->library('upload', $config);
		for ($i = 1; $i <= 5; $i++) {
			if (!empty($_FILES['filefoto' . $i]['name'])) {
				if (!$this->upload->do_upload('filefoto' . $i))
					$this->upload->display_errors();
				else
					echo "Foto berhasil di upload";
			}
		}
		$nama_angsuran = $this->input->post('nama_angsuran');
		$result = array();
		foreach ($nama_angsuran as $key => $val) {
			$result[] = array(
				"ID_angsuran_lain"  	=> random_string('alnum', 6),
				"no_ktp"				=> $_POST['noktp'],
				"nama_angsuran"			=> $_POST['nama_angsuran'][$key],
				"angsuranke"	 		=> $_POST['angsuranke'][$key],
				"jumlah"	 		=> $_POST['totalangsuran'][$key],
				"nominal_angsuran_lain" => $_POST['nominal_angsuran_lain'][$key]
			);
		}
		$this->form_validation->set_rules('noktp', 'noktp', 'required');
		$this->marketing->simpanDataPelanggan($data, $gambar, $result);
		if ($this->form_validation->run() != false) {
			echo $this->session->set_flashdata('msg', 'success');
			redirect('Marketing', 'refresh');
		} else {
			echo $this->session->set_flashdata('msg', 'error-reset');
			redirect('Marketing', 'refresh');
		}
	}
	public function updatedokumen()
	{
		$this->load->library('upload');
		$dataInfo = array();
		$cpt = sizeof($_FILES['userfile']['name']);
		$files = $_FILES;
		for ($i = 0; $i < $cpt; $i++) {
			$_FILES['userfile']['name'] = $files['userfile']['name'][$i];
			$_FILES['userfile']['type'] = $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['error'] = $files['userfile']['error'][$i];
			$_FILES['userfile']['size'] = $files['userfile']['size'][$i];

			//upload an image options
			$config = array();
			$config['upload_path'] = './assets/images/dokumen_pelengkap/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']      = '0';
			$config['overwrite']     = FALSE;
			$new_filename = time() . $_FILES['userfile']['name'][$i];
			$config['file_name'] = $new_filename;

			$this->upload->initialize($config);
			$this->upload->do_upload();
			$dataInfo[] = $this->upload->data();
		}

		$gambar = array(
			'no_ktp'								=> strip_tags($this->input->post('noktp')),
			'fc_ktp' 								=> $dataInfo[0]['file_name'],
			'fc_kk' 								=> $dataInfo[1]['file_name'],
			'slip_gaji' 							=> $dataInfo[2]['file_name'],
			'laporan_keuangan_usaha' 				=> $dataInfo[3]['file_name'],
			'laporan_rekening' 						=> $dataInfo[4]['file_name'],
			'surat_persetujuan_suami_istri' 		=> $dataInfo[5]['file_name'],
			'surat_persetujuan_pembayaran_kredit' 	=> $dataInfo[6]['file_name'],
			'surat_rekomendasi' 					=> $dataInfo[7]['file_name'],
			'surat_perjanjian_agunan_barang' 		=> $dataInfo[8]['file_name'],
			'surat_perjanjian_penjaminan_personal' 	=> $dataInfo[9]['file_name'],
			'slip_gaji_penjamin_personal' 			=> $dataInfo[10]['file_name']

		);
		$config['upload_path'] = './assets/images/dokumen_pelengkap/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		$this->load->library('upload', $config);
		for ($i = 1; $i <= 5; $i++) {
			if (!empty($_FILES['filefoto' . $i]['name'])) {
				if (!$this->upload->do_upload('filefoto' . $i))
					$this->upload->display_errors();
				else
					echo "Foto berhasil di upload";
			}
		}
		$this->form_validation->set_rules('noktp', 'noktp', 'required');
		$this->marketing->updatedokumen($gambar);
		if ($this->form_validation->run() != false) {
			echo $this->session->set_flashdata('msg', 'success');
			redirect('Marketing', 'refresh');
		} else {
			echo $this->session->set_flashdata('msg', 'error-reset');
			redirect('Marketing', 'refresh');
		}
	}

	public function updateDataCustomer()
	{
		$ktp = $this->input->post('ktp');
		$data = array(
			'no_ktp'					=> strip_tags($this->input->post('ktp')),
			'nama'						=> strip_tags($this->input->post('nama')),
			'pekerjaan_sesuai_ktp'		=> strip_tags($this->input->post('psk')),
			'tempat_tanggal_lahir'		=> strip_tags($this->input->post('ttl')),
			'status'					=> strip_tags($this->input->post('status')),
			'jumlah_tanggungan'			=> strip_tags($this->input->post('tanggungan')),
			'alamat'					=> strip_tags($this->input->post('alamat')),
			'no_telepon'				=> strip_tags($this->input->post('notelp')),
			'email'						=> strip_tags($this->input->post('email')),
			'status_rumah'				=> strip_tags($this->input->post('statusrumah')),
			'lama_menetap'				=> strip_tags($this->input->post('lama_menetap')),
			'pekerjaan'					=> strip_tags($this->input->post('pekerjaan')),
			'lama_bekerja'				=> strip_tags($this->input->post('lama_bekerja')),
			'nama_tempat_bekerja'		=> strip_tags($this->input->post('namatemker')),
			'alamat_tempat_bekerja'		=> strip_tags($this->input->post('alamattemker')),
			'income_bulanan'			=> preg_replace("/[^0-9]/", "", $this->input->post('incomebulannya')),
			'income_bulanan_pasangan'	=> preg_replace("/[^0-9]/", "", $this->input->post('incomepasangannya')),
			'total_pengeluaran'			=> preg_replace("/[^0-9]/", "", $this->input->post('totalpengeluaran')),
			'no_rekening'				=> strip_tags($this->input->post('norek')),
			'nama_kontak_darurat'		=> $this->input->post('namakondar'),
			'alamat_kontak_darurat'		=> $this->input->post('alamatkondar'),
			'nomor_kontak_darurat'		=> $this->input->post('teleponkondar'),
			'status_akad'				=> '0',
		);

		$this->marketing->updatedatacustomer($ktp, $data);
		echo $this->session->set_flashdata('msg', 'success-add-data');
		redirect('Marketing', 'refresh');
	}

	function get_autocomplete()
	{
		if (isset($_GET['term'])) {
			$result = $this->marketing->search_cust($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
					$arr_result[] = array(
						'label' => $row->nama,
						'no_ktp' => $row->no_ktp,
					);
				echo json_encode($arr_result);
			}
		}
	}

	function get_unit()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$id_project = $this->input->post('id_project');

		$unit = $this->marketing->get_unit($id_project);

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Pilih</option>";

		foreach ($unit as $data) {
			$lists .= "<option value='" . $data->ID_unit . "'>" . 'Nomor : ' . $data->nomor . ' / ' . 'Type : ' . $data->type . "</option>"; // Tambahkan tag option ke variabel $lists
		}

		$callback = array('list_unit' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}


	public function akad()
	{

		$title = 'Akad';
		$dariDB = $this->marketing->cekidunitdipesan();
		$nourut = substr($dariDB, 3, 4);
		$kode = $nourut + 1;
		$tanggal_akad = date('d/m/Y');

		$data = array(
			'title' => $title,
			'query1' => $this->db->get('project')->result(),
			'idunitdipesan' 	=> $kode,
			'query2' => $this->db->get('voucher')->result(),
			'tanggal_akad' => $tanggal_akad,

		);
		$this->template->load('layout/template_v', 'marketing/akad', $data);
	}
	public function voucher()
	{

		$title = 'Marketing - Voucher';
		$dariDB = $this->marketing->cekidvoucher();
		$nourut = substr($dariDB, 3, 4);
		$kode = $nourut + 1;
		$kodenya = sprintf("%04s", $kode);
		$strkodenya = 'VC' . $kodenya;

		$data = array(
			'title' => $title,
			'idvoucher' => $strkodenya,
			'query2' => $this->db->get('voucher'),

		);
		$this->template->load('layout/template_v', 'marketing/voucher', $data);
	}

	public function tambahakad()
	{
		$this->form_validation->set_rules('harga', 'harga', 'required');
		$this->form_validation->set_rules('dp', 'dp', 'required');
		$this->form_validation->set_rules('angsuran_bulanan', 'angsuran_bulanan', 'required');

		if ($this->form_validation->run() == false) {
			echo $this->session->set_flashdata('msg', 'error-register');
			redirect('Marketing/akad', 'refresh');
		} else {
			//input data akad
			$id_akad = $this->input->post('id_unit_dipesan');
			$no_ktp = $this->input->post('no_ktp');
			$dp = filter_var($this->input->post('dp'), FILTER_SANITIZE_NUMBER_INT);
			$lama_dp = $this->input->post('lama_angsuran_dp');
			$bulanan = filter_var($this->input->post('angsuran_bulanan'), FILTER_SANITIZE_NUMBER_INT);
			$lama_bulanan = $this->input->post('lama_angsuran_bulanan');
			$harga = filter_var($this->input->post('harga'), FILTER_SANITIZE_NUMBER_INT);
			$ktp_marketing = $this->input->post('ktp_marketing');
			$unit = $this->input->post('unit');
			$id_project = $this->input->post('project');
			$tanggal_akad = $this->input->post('tanggal_akad');
			$status_marketing_fee = "MENUNGGU";
			$this->marketing->simpanUnitDipilih($id_akad, $no_ktp, $dp, $lama_dp, $bulanan, $lama_bulanan, $harga, $ktp_marketing, $unit, $id_project, $tanggal_akad, $status_marketing_fee);
		}
		// input proyeksi cicilan
		//ambil ID data angsuran terbesar
		$dariDB = $this->marketing->cekidangsuranbulanan();
		$nourut = substr($dariDB, 3, 4);
		//mengambil data invoice terbesar
		$dariDB2 = $this->marketing->cekidinvoicebulanan();
		$nourut2 = substr($dariDB2, 3, 4);
		//ambil ID data angsuran DP
		$dariDB3 = $this->marketing->cekidangsuranbulanandp();
		$nourut3 = substr($dariDB3, 3, 4);
		//mengambil data invoice terbesar DP
		$dariDB4 = $this->marketing->cekidinvoicebulanandp();
		$nourut4 = substr($dariDB4, 3, 4);
		//ambil ID data angsuran injek
		$dariDB5 = $this->marketing->cekidinjek();
		$nourut5 = substr($dariDB5, 3, 4);
		//mengambil data invoice terbesar injek
		$dariDB6 = $this->marketing->cekidinvoiceinjek();
		$nourut6 = substr($dariDB6, 3, 4);
		//menentukan tanggal sekarang bulan dan tahun
		$tanggal = 	date('d');
		$bulan = date('m');
		$tahun = date('Y');
		$lama_injek = $this->input->post('lama_injeksi');
		$no_ktp = $this->input->post('no_ktp');
		$injek = filter_var($this->input->post('injeksi'), FILTER_SANITIZE_NUMBER_INT);
		$nominal_injek = filter_var($this->input->post('total_injeksi'), FILTER_SANITIZE_NUMBER_INT);
		$nominal_angsuran_bulanan = filter_var($this->input->post('angsuran_bulanan'), FILTER_SANITIZE_NUMBER_INT);
		$nominal_angsuran_dp = filter_var($this->input->post('angsuran_dp'), FILTER_SANITIZE_NUMBER_INT);
		$diskon = $this->input->post('voucher');
		$persenan = $diskon / 100;
		$nilai_diskon = filter_var($this->input->post('harga'), FILTER_SANITIZE_NUMBER_INT) * $persenan;
		$harganya = filter_var($this->input->post('harga'), FILTER_SANITIZE_NUMBER_INT) - $nominal_injek - $dp - $nilai_diskon;
		$status = 0;

		//looping menurut lama angsuran bulanan
		for ($i = 1; $i <= $lama_bulanan; $i++) {
			//penentuan ID_angsuran_bulanan + Invoice otomatis
			$kode1 =  $nourut + 1;
			$kodenya = sprintf("%04s", $kode1);
			$strkodenya = 'ABL' . $kodenya;
			$kodeinvoice = $nourut2 + 1;
			$kodenyainvoice = sprintf("%04s", $kodeinvoice);
			$strkodeinvoice = "IAB" . $kodenyainvoice;
			//akhir penentuan ID_angsuran_bulanan + Invoice otomatis
			$angsuran_ke = $i;		//angsuran ke---
			$sesudah = $bulan + 1;
			if ($sesudah > 12) { //jika bulan sudah lebih dari 12 , maka balik lagi menjadi 1
				$sesudah = 1;
				$tahun = $tahun + 1; // tahun bertambah jika bulan mencapai 12 dan balik menjadi 1
			}
			$sisa_angsuran = $harganya - $nominal_angsuran_bulanan;		//pengurangan sisa angsuran

			if ($sisa_angsuran < $nominal_angsuran_bulanan) {
				$nominal_angsuran_bulanan = $harganya;
				$sisa_angsuran = $harganya - $nominal_angsuran_bulanan;
			} else {
				$harganya = $sisa_angsuran;
			}
			//sisa angsuran menjadi harga acuan untuk di kurangai angsuran
			$bulan = $sesudah;				//merubah bulan menjadi bulan yang sudah di tambah
			$nourut = $kode1;				//merubah nomor urut menjadi yang sudah di tambah
			$nourut2 = $kodeinvoice;		//merubah invoice  menjadi yang sudah di tambah
			$datenya = $tahun . '-' . $bulan . '-' . $tanggal;
			$this->marketing->proyeksi_angsuran($strkodenya, $no_ktp, $angsuran_ke, $tanggal, $bulan, $tahun, $datenya, $nominal_angsuran_bulanan, $sisa_angsuran, $status, $strkodeinvoice);
		}
		$tahun = date('Y');
		for ($i = 1; $i <= $lama_dp; $i++) {
			//penentuan ID_angsuran_bulanan + Invoice otomatis

			$kode1 =  $nourut3 + 1;
			$kodenya = sprintf("%04s", $kode1);
			$strkodenya = 'ADP' . $kodenya;
			$kodeinvoice = $nourut4 + 1;
			$kodenyainvoice = sprintf("%04s", $kodeinvoice);
			$strkodeinvoice = "IDP" . $kodenyainvoice;
			//akhir penentuan ID_angsuran_bulanan + Invoice otomatis
			$angsuran_ke = $i;		//angsuran ke---
			$sesudah = $bulan + 1;
			if ($sesudah > 12) { //jika bulan sudah lebih dari 12 , maka balik lagi menjadi 1
				$sesudah = 1;
				$tahun = $tahun + 1; // tahun bertambah jika bulan mencapai 12 dan balik menjadi 1
			}
			$sisa_angsuran = $dp - $nominal_angsuran_dp;		//pengurangan sisa angsuran

			if ($sisa_angsuran < $nominal_angsuran_dp) {
				$nominal_angsuran_dp = $dp;
				$sisa_angsuran = $dp - $nominal_angsuran_dp;
			} else {
				$dp = $sisa_angsuran;
			}
			//sisa angsuran menjadi harga acuan untuk di kurangai angsuran
			$bulan = $sesudah;				//merubah bulan menjadi bulan yang sudah di tambah
			$nourut3 = $kode1;				//merubah nomor urut menjadi yang sudah di tambah
			$nourut4 = $kodeinvoice;		//merubah invoice  menjadi yang sudah di tambah
			$datenya = $tahun . '-' . $bulan . '-' . $tanggal;
			$this->marketing->proyeksi_angsuran_dp($strkodenya, $no_ktp, $angsuran_ke, $tanggal, $bulan, $tahun, $datenya, $nominal_angsuran_dp, $sisa_angsuran, $status, $strkodeinvoice);
		}
		$tahun = date('Y');
		//injeksi
		for ($i = 1; $i <= $lama_injek; $i++) {
			//penentuan ID_angsuran_bulanan + Invoice otomatis

			$kode1 =  $nourut5 + 1;
			$kodenya = sprintf("%04s", $kode1);
			$strkodenya = 'AIJ' . $kodenya;
			$kodeinvoice = $nourut6 + 1;
			$kodenyainvoice = sprintf("%04s", $kodeinvoice);
			$strkodeinvoice = "IIJ" . $kodenyainvoice;
			$nourut5 = $kode1;				//merubah nomor urut menjadi yang sudah di tambah
			$nourut6 = $kodeinvoice;		//merubah invoice  menjadi yang sudah di tambah
			$angsuran_ke = $i;

			$sisa_angsuran = $nominal_injek - $injek;
			$tahunnya = $tahun + 1;
			$tahun = $tahunnya;
			$datenya = $tahun . '-' . $bulan . '-' . $tanggal;
			$this->marketing->proyeksi_angsuran_injek($strkodenya, $no_ktp, $angsuran_ke, $tanggal, $bulan, $tahun, $datenya, $injek, $sisa_angsuran, $status, $strkodeinvoice);
			$nominal_injek = $sisa_angsuran;
		}

		echo $this->session->set_flashdata('msg', 'success-add-data');
		redirect('Marketing/akad', 'refresh');
	}

	function tambahvoucher()
	{
		$id = $this->input->post('id_voucher');
		$nama_voucher = $this->input->post('nama_voucher');
		$nominal = $this->input->post('nominal');
		$expired = $this->input->post('expired');
		$max_used = $this->input->post('max_used');

		$this->marketing->tambahvoucher($id, $nama_voucher, $nominal, $expired, $max_used);
		echo $this->session->set_flashdata('msg', 'success-add-data');
		redirect('Marketing/voucher', 'refresh');
	}
}
