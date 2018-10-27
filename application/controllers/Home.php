<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	// auto-load m_admin_side_nav model
	public function __construct(){
		parent::__construct();
		#$this->load->model('admin/m_admin_side_nav');
	}


	public function index() // controller method
	{	
		$data['title'] = 'Home'; // <title> ng page

		$this->load->view('common/header-assets', $data); // included files
		$this->load->view('common/lp-header', $data); // include header
		$this->load->view('index/home', $data);	// main view file
		$this->load->view('common/lp-footer', $data); // include footer
		$this->load->view('common/footer-assets'); // included files
	}

	public function exec(){
		
		$data['title'] = 'Exec'; 

		$this->load->view('common/header-assets', $data); 
		// $this->load->view('common/lp-header', $data); 
		$this->load->view('index/exec', $data);	
		// $this->load->view('common/lp-footer', $data); 
		$this->load->view('common/footer-assets'); 
	}
}
