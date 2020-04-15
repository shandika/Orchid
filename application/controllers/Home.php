<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Home extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Marketing_model', 'marketing');
		if ($this->session->userdata('masuk') != TRUE) {
		 	echo $this->session->set_flashdata('msg','Anda Harus Login Terlebih Dahulu !');
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
                redirect('Home/customer', 'refresh');
            }elseif ($level == 2) {
                redirect('Home/pm', 'refresh');
            }else {
                redirect('Home/marketing', 'refresh');
            }
        }else {
        	$title = 'Home';
			$data = array(
	            'title' => $title,
	        );
			$this->template->load('layout/template_v', 'dashboard/dashboard_v', $data);
        }
	}

	public function customer()
	{
		$title = 'Home';
		$data = array(
            'title' => $title,
        );
		$this->template->load('layout/template_v', 'customer/dashboard_v', $data);
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

	public function pm()
	{
		$title = 'Home';
		$data = array(
            'title' => $title,
        );
		$this->template->load('layout/template_v', 'pm/dashboard_v', $data);
	}

	


}
