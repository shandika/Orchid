<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'auth');
		$level = $this->session->userdata('level');
        if (!empty($level)) {
            if ($level == 1) {
                redirect('Home/customer', 'refresh');
            }elseif ($level == 2) {
                redirect('Home/pm', 'refresh');
            }else {
                redirect('Home/marketing', 'refresh');
            }
        } else{
        	$title = 'LOGIN';
			$data = array(
	            'title' => $title,
	        );
        	$this->load->view('auth/login_v', $data);
        }
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index()
	{
		/**
		 * @null
		 */
	}

	/**
	 * Log the user in
	 */
	public function login()
	{
		$this->form_validation->set_rules('ktp', 'ktp', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
        $ktp = $this->input->post('ktp');
        $psw = $this->input->post('password');
        $k = ($ktp);
        $p = sha1($psw);

        if ($this->form_validation->run() == FALSE) {
            echo $this->session->set_flashdata('msg','Silahkan Isi Seluruh Form !');
            redirect('Auth', 'refresh');
        } else{
            // $cekCust = $this->auth->cekCust($k,$p);
            // if ($cekCust->num_rows() > 0) {
            //     //login berhasil, buat session
            //     foreach ($cekCust->result() as $login) {
            //         $sesi = array(
            //         'ktp'       => $login->ktp,
            //         'nama'      => $login->nama,
            //         'alamat'    => $login->alamat,
            //         'password'  => $login->password,
            //         'level'     => 1,
            //     );
            //     $this->session->set_userdata('masuk',TRUE);
            //     $this->session->set_userdata($sesi);
            //     }
            //     echo $this->session->set_flashdata('msg','success-login');
            //     redirect('Home/customer', 'refresh');
            // }
            $cekPm = $this->auth->cekPm($k,$p);
            if ($cekPm->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cekPm->result() as $login) {
                    $sesi = array(
                    'ktp'       => $login->ktp,
                    'nama'      => $login->nama,
                    'alamat'    => $login->alamat,
                    'password'  => $login->password,
                    'level'     => 2,
                );
                $this->session->set_userdata('masuk',TRUE);
                $this->session->set_userdata($sesi);
                }
                echo $this->session->set_flashdata('msg','success-login');
                redirect('Home/pm', 'refresh');
            }
            $cekMar = $this->auth->cekMar($k,$p);
            if ($cekMar->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cekMar->result() as $login) {
                    $sesi = array(
                    'ktp'       => $login->ktp,
                    'nama'      => $login->nama,
                    'alamat'    => $login->alamat,
                    'password'  => $login->password,
                    'level'     => 3,
                );
                $this->session->set_userdata('masuk',TRUE);
                $this->session->set_userdata($sesi);
                }
                echo $this->session->set_flashdata('msg','success-login');
                redirect('Home/marketing', 'refresh');
            }else{
                echo $this->session->set_flashdata('msg','Username atau Password Tidak Sesuai !');
                redirect('Auth', 'refresh');
            }
	    }
    }

	/**
	 * Log the user out
	 */
	public function logout()
	{
        $this->session->sess_destroy();
        $url= base_url('');
        redirect($url, 'refresh');
	}

}
