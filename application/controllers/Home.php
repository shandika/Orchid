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
			} elseif($level==3) {
				redirect('Home/marketing', 'refresh');
			}else {
				redirect('Home/keuangan', 'refresh');
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
	public function notif_keuangan() {
		// Angsuran DP
		$query = $this->db->query("SELECT ID_dp, angsuran_ke, ID_invoice_dp, nominal_angsuran_dp, email, angsuran_dp.date, angsuran_dp.status, customer.nama, customer.no_ktp FROM customer JOIN angsuran_dp ON customer.no_ktp = angsuran_dp.no_ktp WHERE angsuran_dp.date = date_add(curdate(),INTERVAL 7 DAY) AND angsuran_dp.status =0 AND angsuran_dp.status_email=0")->result();
		$output = '';
		foreach ($query as $d) {
			$output .='
				<div class="card-body">
                    <p class="card-text">7 Hari Sebelum Jatuh Tempo Pembayaran Angsuran DP Ke-'.$d->angsuran_ke.' Atas Nama '.$d->nama.'</p>
                    
                    <form action="'.base_url('Home/send').'" method="POST">
                        <input name="email_penerima" type="hidden" value="'.$d->email.'">
                        <input name="id_dp" type="hidden" value="'.$d->ID_dp.'">
                        <input type="hidden" name="pesan" value="Yang Terhormat Bpk/Ibu '.$d->nama.',
	    Terima kasih atas kepercayaan memilih Royal Orchid Syariah sebagai pilihan untuk keluarga Anda.<br><br>Berikut ini kami informasikan tagihan Angsuran DP tanggal '.$d->date.' sebesar '.number_format($d->nominal_angsuran_dp, 2, ',', '.').'. Silahkan abaikan pemberitahuan ini apabila sudah melakukan pembayaran.<br><br>Pembayaran tagihan Royal Orchid Syariah dapat dilakukan dengan, melalui cara berikut :">
                        <button title="Kirim Email" onclick="return confirm ("Anda yakin ingin kirim email ?")" class="btn btn-sm btn-success float-right"><i class="fa ti-email"></i>
                        </button>
                    </form>   
                </div>
                <hr />
			';
		}
		echo $output;

		// Angsuran Bulanan
		$query = $this->db->query("SELECT ID_angsuran_bulanan, angsuran_ke, ID_invoice_angsuran_bulanan, email, nominal_angsuran_bulanan, angsuran_bulanan.date, angsuran_bulanan.status, customer.nama, customer.no_ktp FROM customer JOIN angsuran_bulanan ON customer.no_ktp = angsuran_bulanan.no_ktp WHERE angsuran_bulanan.date = date_add(curdate(),INTERVAL 7 DAY) AND angsuran_bulanan.status =0 AND angsuran_bulanan.status_email=0")->result();
		$output = '';
		foreach ($query as $d) {
			$output .='
				<div class="card-body">
                    <p class="card-text">7 Hari Sebelum Jatuh Tempo Pembayaran Angsuran Bulanan Ke-'.$d->angsuran_ke.' Atas Nama '.$d->nama.'</p>
                    <form action="'.base_url('Home/send').'" method="POST">
                        <input name="email_penerima" type="hidden" value="'.$d->email.'">
                        <input name="id_bulan" type="hidden" value="'.$d->ID_angsuran_bulanan.'">
                        <input type="hidden" name="pesan" value="Yang Terhormat Bpk/Ibu '.$d->nama.',
	    Terima kasih atas kepercayaan memilih Royal Orchid Syariah sebagai pilihan untuk keluarga Anda.<br><br>Berikut ini kami informasikan tagihan Angsuran Bulanan tanggal '.$d->date.' sebesar '.number_format($d->nominal_angsuran_bulanan, 2, ',', '.').'. Silahkan abaikan pemberitahuan ini apabila sudah melakukan pembayaran.<br><br>Pembayaran tagihan Royal Orchid Syariah dapat dilakukan dengan, melalui cara berikut :">
                        <button title="Kirim Email" onclick="return confirm ("Anda yakin ingin kirim email ?")" class="btn btn-sm btn-success float-right"><i class="fa ti-email"></i>
                        </button>
                    </form>   
                </div>
                <hr />
			';
		}
		echo $output;

		// Angsuran Injek
		$query = $this->db->query("SELECT ID_injek, angsuran_ke, ID_invoice_injek, nominal_injek, email, angsuran_injek.date, angsuran_injek.status, customer.nama, customer.no_ktp FROM customer JOIN angsuran_injek ON customer.no_ktp = angsuran_injek.no_ktp WHERE angsuran_injek.date = date_add(curdate(),INTERVAL 7 DAY) AND angsuran_injek.status =0 AND angsuran_injek.status_email=0")->result();
		$output = '';
		foreach ($query as $d) {
			$output .='
				<div class="card-body">
                    <p class="card-text">7 Hari Sebelum Jatuh Tempo Pembayaran Angsuran Injek Ke-'.$d->angsuran_ke.' Atas Nama '.$d->nama.'</p>
                    <form action="'.base_url('Home/send').'" method="POST">
                        <input name="email_penerima" type="hidden" value="'.$d->email.'">
                        <input name="id_injek" type="hidden" value="'.$d->ID_injek.'">
                        <input type="hidden" name="pesan" value="Yang Terhormat Bpk/Ibu '.$d->nama.',
	    Terima kasih atas kepercayaan memilih Royal Orchid Syariah sebagai pilihan untuk keluarga Anda.<br><br>Berikut ini kami informasikan tagihan Angsuran Injek tanggal '.$d->date.' sebesar '.number_format($d->nominal_injek, 2, ',', '.').'. Silahkan abaikan pemberitahuan ini apabila sudah melakukan pembayaran.<br><br>Pembayaran tagihan Royal Orchid Syariah dapat dilakukan dengan, melalui cara berikut :">
                        <button title="Kirim Email" onclick="return confirm ("Anda yakin ingin kirim email ?")" class="btn btn-sm btn-success float-right"><i class="fa ti-email"></i>
                        </button>
                    </form>   
                </div>
                <hr />
			';
		}
		echo $output;
	}
	public function send(){
	    $this->load->library('mailer');

	    $email_penerima = $this->input->post('email_penerima');
	    $subjek = "Pemberitahuan Pembayaran Angsuran";
	    $pesan = $this->input->post('pesan');;
	    $content = $this->load->view('content', array('pesan'=>$pesan), true);
	    $sendmail = array(
	      'email_penerima'=>$email_penerima,
	      'subjek'=>$subjek,
	      'content'=>$content
	    );
	    $id_dp = $this->input->post('id_dp');
	    $id_bulan = $this->input->post('id_bulan');
	    $id_injek = $this->input->post('id_injek');
	    $this->keuangan->updateEmailAngsuranDP($id_dp);
	    $this->keuangan->updateEmailAngsuranBulanan($id_bulan);
	    $this->keuangan->updateEmailAngsuranInjek($id_injek);
	    $send = $this->mailer->send($sendmail);
	   	if ($send) {
	   		echo $this->session->set_flashdata('msg', 'success-email');
	        $title = 'Keuangan - General Ledger';
	        $data = array(
	            'title' => $title,
	            'query' => $this->keuangan->tampilDataGL(),
	            'query2' => $this->db->get('project')->result(),
	        );
	        $this->template->load('layout/template_v', 'keuangan/general_ledger', $data);
	   	}else{
	   		echo $this->session->set_flashdata('msg', 'error-email');
	        $title = 'Keuangan - General Ledger';
	        $data = array(
	            'title' => $title,
	            'query' => $this->keuangan->tampilDataGL(),
	            'query2' => $this->db->get('project')->result(),
	        );
	        $this->template->load('layout/template_v', 'keuangan/general_ledger', $data);
	   	}
     
	}
	public function jum_notif() {
		$result = $this->pm->jum_msg();
		$data['tot'] = $result;
		echo json_encode($data);
	}
}
