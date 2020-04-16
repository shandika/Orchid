<?php defined('BASEPATH') or exit('No direct script access allowed');

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
            } elseif ($level == 2) {
                redirect('Home/pm', 'refresh');
            } elseif ($level == 3) {
                redirect('Home/marketing', 'refresh');
            } elseif ($level == 4) {
                redirect('Home/keuangan', 'refresh');
            } elseif ($level == 5) {
                $title = 'REGISTATION';
                $data = array(
                    'title' => $title,
                );
                $this->load->view('auth/registration', $data);
            }
        } else {
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
            echo $this->session->set_flashdata('msg', 'Silahkan Isi Seluruh Form !');
            redirect('Auth', 'refresh');
        } else {
            $cekPurchasing = $this->auth->cekPurchasing($k, $p);
            if ($cekPurchasing->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cekPurchasing->result() as $login) {
                    $sesi = array(
                        'ktp'       => $login->ktp,
                        'nama'      => $login->nama,
                        'alamat'    => $login->alamat,
                        'password'  => $login->password,
                        'level'     => 1,
                    );
                    $this->session->set_userdata('masuk', TRUE);
                    $this->session->set_userdata($sesi);
                }
                echo $this->session->set_flashdata('msg', 'success-login');
                redirect('Home/customer', 'refresh');
            }
            $cekProjectManager = $this->auth->cekProjectManager($k, $p);
            if ($cekProjectManager->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cekProjectManager->result() as $login) {
                    $sesi = array(
                        'ktp'       => $login->ktp,
                        'nama'      => $login->nama,
                        'alamat'    => $login->alamat,
                        'password'  => $login->password,
                        'level'     => 2,
                    );
                    $this->session->set_userdata('masuk', TRUE);
                    $this->session->set_userdata($sesi);
                }
                echo $this->session->set_flashdata('msg', 'success-login');
                redirect('Home/pm', 'refresh');
            }
            $cekMarketing = $this->auth->cekMarketing($k, $p);
            if ($cekMarketing->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cekMarketing->result() as $login) {
                    $sesi = array(
                        'ktp'       => $login->ktp,
                        'nama'      => $login->nama,
                        'alamat'    => $login->alamat,
                        'password'  => $login->password,
                        'level'     => 3,
                    );
                    $this->session->set_userdata('masuk', TRUE);
                    $this->session->set_userdata($sesi);
                }
                echo $this->session->set_flashdata('msg', 'success-login');
                redirect('Home/marketing', 'refresh');
            }
            $cekKeuangan = $this->auth->cekKeuangan($k, $p);
            if ($cekKeuangan->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cekKeuangan->result() as $login) {
                    $sesi = array(
                        'ktp'       => $login->ktp,
                        'nama'      => $login->nama,
                        'alamat'    => $login->alamat,
                        'password'  => $login->password,
                        'level'     => 4,
                    );
                    $this->session->set_userdata('masuk', TRUE);
                    $this->session->set_userdata($sesi);
                }
                echo $this->session->set_flashdata('msg', 'success-login');
                redirect('Home/keuangan', 'refresh');
            } else {
                echo $this->session->set_flashdata('msg', 'Username atau Password Tidak Sesuai !');
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
        $url = base_url('');
        redirect($url, 'refresh');
    }

    public function registration()
    {
        $error = 'Silahkan Isi Seluruh Form !';
        $this->form_validation->set_rules('ktp', 'ktp', 'required|trim|xss_clean|is_unique[akun_marketing.ktp]');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim|xss_clean');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim|xss_clean');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'trim|xss_clean');
        $this->form_validation->set_rules('password1', 'password1', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'password2', 'required|trim|matches[password1]');

        $db = $this->input->post('jabatan');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $psw1 = $this->input->post('password1');
        $psw2 = $this->input->post('password2');

        $p1 = sha1($psw1);
        $p2 = sha1($psw2);

        if ($p1 != $p2) {
            $error = 'Password tidak sama';
        }
        if ($db == 'akun_marketing') {
            $this->form_validation->set_rules('ktp', 'ktp', 'required|trim|xss_clean|is_unique[akun_marketing.ktp]');
            $ktp = $this->input->post('ktp');
            $k = ($ktp);
        } elseif ($db == 'akun_purchasing') {
            $this->form_validation->set_rules('ktp', 'ktp', 'required|trim|xss_clean|is_unique[akun_purchasing.ktp]');
            $ktp = $this->input->post('ktp');
            $k = ($ktp);
        } elseif ($db == 'akun_project_manager') {
            $this->form_validation->set_rules('ktp', 'ktp', 'required|trim|xss_clean|is_unique[akun_project_manager.ktp]');
            $ktp = $this->input->post('ktp');
            $k = ($ktp);
        } elseif ($db == 'akun_keuangan') {
            $this->form_validation->set_rules('ktp', 'ktp', 'required|trim|xss_clean|is_unique[akun_keuangan.ktp]');
            $ktp = $this->input->post('ktp');
            $k = ($ktp);
        }
        if ($this->form_validation->run() == FALSE) {
            echo $this->session->set_flashdata('msg', 'error-register');
            redirect('Auth');
        } else {
            $register = $this->auth->registrasi($ktp, $nama, $alamat, $p1, '1', $no_telp, $db);
            echo $this->session->set_flashdata('msg', 'success-registration');
            redirect('', 'refresh');
        }
    }
    public function move_registration()
    {
        $sesi['level'] = 5;
        $this->session->set_userdata($sesi);
        $url = base_url('Auth');
        redirect($url, 'refresh');
    }

    public function back_login()
    {
        $this->session->sess_destroy();
        $url = base_url('');
        redirect($url, 'refresh');
    }
}
