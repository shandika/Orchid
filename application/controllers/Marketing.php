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
		if ($this->form_validation->run() != false) {
			echo $this->session->set_flashdata('msg', 'success');
			redirect('Marketing', 'refresh');
		} else {
			echo $this->session->set_flashdata('msg', 'error-reset');
			redirect('Marketing', 'refresh');
		}
	}

	public function tampilPelanggan()
	{
	}
}
