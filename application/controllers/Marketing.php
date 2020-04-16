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
			'status_rumah'				=> strip_tags($this->input->post('stsrumah')),
			'lama_menetap'				=> strip_tags($this->input->post('lmmenetap')),
			'pekerjaan'					=> strip_tags($this->input->post('pekerjaan')),
			'lama_bekerja'				=> strip_tags($this->input->post('lmbekerja')),
			'nama_tempat_bekerja'		=> strip_tags($this->input->post('nmtpbekerja')),
			'alamat_tempat_bekerja'		=> strip_tags($this->input->post('altpbekerja')),
			'income_bulanan'			=> strip_tags($this->input->post('inbulanan')),
			'income_bulanan_pasangan'	=> strip_tags($this->input->post('inblnpasangan')),
			'no_rekening'				=> strip_tags($this->input->post('norek')),
			'nama_kontak_darurat'		=> strip_tags($this->input->post('nmktdarurat')),
			'alamat_kontak_darurat'		=> strip_tags($this->input->post('alktdarurat')),
			'nomor_kontak_darurat'		=> strip_tags($this->input->post('noktdarurat'))
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
		$this->marketing->simpanDataPelanggan($data);
		$nama_angsuran = $this->input->post('nama_angsuran');
		$result = array();
		foreach ($nama_angsuran as $key => $val) {
			$result[] = array(
				"ID_angsuran_lain"  	=> random_string('alnum', 6),
				"no_ktp"				=> $_POST['noktp'],
				"nama_angsuran"			=> $_POST['nama_angsuran'][$key],
				"angsuranke"	 		=> $_POST['angsuranke'][$key],
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

	function get_autocomplete(){
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


	public function akad()
	{
		$title = 'Akad';
		$data = array(
			'title' => $title,
		);
		$this->template->load('layout/template_v', 'marketing/akad', $data);
	}

	public function tambahakad()
	{
	}
}
