<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	// auto-load m_admin_side_nav model
	public function __construct(){
		parent::__construct();
		#$this->load->model('admin/m_admin_side_nav');
	}


	public function index() // controller method
	{	
		$data['title'] = 'Dashboard'; // <title> ng page

		// $this->load->view('common/header-assets', $data); // included files
		// $this->load->view('common/lp-header', $data); // include header
		// $this->load->view('client/home', $data);	// main view file
		// $this->load->view('common/lp-footer', $data); // include footer
		// $this->load->view('common/footer-assets'); // included files
	}

	public function profile()
	{	
		$data['title'] = 'Profile'; 

		$this->load->view('common/header-assets', $data); 
		$this->load->view('common/admin-header', $data); 
		$this->load->view('admin/profile', $data);	
		// $this->load->view('common/client-footer', $data); 
		$this->load->view('common/footer-assets'); 
	}

	##########################
	#	MAIN TRANSACTION
	##########################

	public function orders()
	{	
		$data['title'] = 'Orders'; 

		$this->load->view('common/header-assets', $data); 
		$this->load->view('common/admin-header', $data); 
		$this->load->view('admin/orders', $data); 
		$this->load->view('common/footer-assets'); 
	}

	public function qoutations()
	{	
		$data['title'] = 'Qoutations'; 

		$this->load->view('common/header-assets', $data); 
		$this->load->view('common/admin-header', $data); 
		$this->load->view('admin/qoutations', $data); 
		$this->load->view('common/footer-assets'); 
	}

	public function collections()
	{	
		$data['title'] = 'Collections'; 

		$this->load->view('common/header-assets', $data); 
		$this->load->view('common/admin-header', $data); 
		$this->load->view('admin/collections', $data); 
		$this->load->view('common/footer-assets'); 
	}

	#****************************************#
	#
	#
	#		ADMIN-SIDE REPORT GENERATION
	#
	#
	#****************************************#

	public function test(){

		$this->load->view('admin/reports/test');

		// Get output html
		$html = $this->output->get_output();

		// Load pdf library
		$this->load->library('pdf');

		// Load HTML content
		$this->dompdf->loadHtml($html);

		// Setup paper size and orientation
		$this->dompdf->setPaper('A4','landscape');
	
		// Render the HTML as PDF
		$this->dompdf->render();

		// Output the PDF; 0 = preview; 1 = download
		$this->dompdf->stream('Test.pdf', array("Attachment" => 0));
	}

}
