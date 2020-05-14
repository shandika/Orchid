<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Marketing_model', 'marketing');
		$this->load->model('Keuangan_model', 'keuangan');
		$this->load->model('Pm_model', 'pm');
		$this->load->model('purchasing_model', 'purchasing');
		if ($this->session->userdata('masuk') != TRUE) {
			echo $this->session->set_flashdata('msg', 'Anda Harus Login Terlebih Dahulu !');
			redirect('Auth');
		}
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index()
	{

		$level = $this->session->userdata('level');
		if (!empty($level)) {
			if ($level == 1) {
				redirect('Home/purchasing', 'refresh');
			} elseif ($level == 2) {
				redirect('Home/pm', 'refresh');
			} else {
				redirect('Home/marketing', 'refresh');
			}
		} else {
			$title = 'Home';
			$data = array(
				'title' => $title,
			);
			$this->template->load('layout/template_v', 'dashboard/dashboard_v', $data);
		}
	}

	public function purchasing()
	{
		$title = 'Home';
		$data = array(
			'title' => $title,
			'query' => $this->purchasing->tampilDataPR()
		);
		$this->template->load('layout/template_v', 'purchasing/preorder', $data);
	}

	public function marketing()
	{
		$title = 'Home';
		$data = array(
			'title' => $title,
			'query' => $this->marketing->tampilDataPelanggan(),
		);
		$this->template->load('layout/template_v', 'marketing/dashboard_v', $data);
	}
	public function keuangan()
	{
		$title = 'Keuangan - General Ledger';

		$data = array(
			'title' => $title,
			'query' => $this->keuangan->tampilDataGL(),
			'query2' => $this->db->get('project')->result(),
		);
		$this->template->load('layout/template_v', 'keuangan/general_ledger', $data);
	}

	public function pm()
	{
		// id project
		$dariDB = $this->pm->cekidproject();
		$nourut = substr($dariDB, 3, 4);
		$kode1 =  $nourut + 1;
		$kodenya = sprintf("%04s", $kode1);
		$strkodenya = 'PJ' . $kodenya;

		$title = 'Project Manager - Project';
		$data = array(
			'title' => $title,
			'project' => $this->pm->getAll(),
			'idP' => $strkodenya
		);
		$this->template->load('layout/template_v', 'pm/dashboard_v', $data);
	}

	public function notif_pm() {
		$query = $this->db->query("SELECT ID_dp, ID_invoice_dp, nominal_angsuran_dp, angsuran_dp.status, customer.nama, customer.no_ktp FROM customer JOIN angsuran_dp ON customer.no_ktp = angsuran_dp.no_ktp WHERE angsuran_dp.status = 1 AND angsuran_dp.sisa_angsuran='0' ORDER BY angsuran_dp.ID_dp DESC")->result();
		$output = '';
		foreach ($query as $d) {
			$output .='
				<div class="card-body">
                    <p class="card-text">Unit Atas Nama '.$d->nama.' Siap Dibangun</p>
                    <hr />
                </div>
			';
		}
		echo $output;
	}
	public function jum_notif() {
		$result = $this->pm->jum_msg();
		$data['tot'] = $result;
		echo json_encode($data);
	}
}
