<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {


	// auto-load m_admin_side_nav model
	public function __construct(){
		parent::__construct();
		#$this->load->model('admin/m_admin_side_nav');
	}

	// check if client is legit
	public function client_check(){
		if($this->session->userdata('logged_in') != TRUE){
			$this->session->set_flashdata('errors',"You must login first!");
            redirect('home/index');
        }
	}


	public function index() // controller method
	{	
		$this->client_check();
		$data['title'] = 'Dashboard'; // <title> ng page

		// $this->load->view('common/header-assets', $data); // included files
		// $this->load->view('common/lp-header', $data); // include header
		// $this->load->view('client/home', $data);	// main view file
		// $this->load->view('common/lp-footer', $data); // include footer
		// $this->load->view('common/footer-assets'); // included files
	}

	public function profile()
	{	
		$this->client_check();
		$data['title'] = 'Profile'; 

		$this->load->view('common/header-assets', $data); 
		$this->load->view('common/client-header', $data); 
		$this->load->view('client/profile', $data);	
		// $this->load->view('common/client-footer', $data); 
		$this->load->view('common/footer-assets'); 
	}

	// ordering
	public function order()
	{	
		$this->client_check();
		$this->load->model('client/m_order');
		$data['title'] = 'Order'; 

		$this->load->view('common/header-assets', $data); 
		$this->load->view('common/client-header', $data); 
		$this->load->view('client/order', $data); 
		$this->load->view('common/footer-assets'); 
	}

	// sent orders
	public function ordered()
	{	
		$this->client_check();
		$this->load->model('client/m_ordered');
		$data['title'] = 'Ordered'; 

		$this->load->view('common/header-assets', $data); 
		$this->load->view('common/client-header', $data); 
		$this->load->view('client/ordered', $data); 
		$this->load->view('common/footer-assets'); 
	}

	#*** LOGOUT ***#
	public function logout(){
		session_destroy();
		session_start();
		$this->session->set_flashdata('errors',"Logged out successful!");
		redirect('home/index');
	}
}
