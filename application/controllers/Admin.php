<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	// auto-load m_admin_side_nav model
	public function __construct(){
		parent::__construct();
		#$this->load->model('admin/m_admin_side_nav');

		####################
		#
		#	START EMAIL
		#
		####################
		// set data  
		// $l_id 					= $this->input->post('loan_id');
		// $first_payment_sched 	= $this->input->post('scheduleFirstPayment');
		// $remarks 				= $this->input->post('remarks');
		// $email 					= $this->input->post('email_address');
		// $subject 				= "[MAFLC] Payment Recieved";
		// $message 				= "Your payment has been posted visit the link to download your Official Receipt ".base_url()."borrower/reports-official-receipt?lp_id=".$lpt_id."&l_id=".$l_id." . Thank you :)";

		// $this->m_send_notification->send_email($email, $subject, $message);
		####################
		#
		#	END EMAIL
		#
		####################
	}

	// check if admin is legit
	public function admin_check(){
		if($this->session->userdata('logged_in') != TRUE || !isset($_SESSION['adminID'])){
			$this->session->set_flashdata('errors',"You must login first!");
            redirect('home/exec');
        }
	}


	public function index() // controller method
	{	
		$this->admin_check();
		$data['title'] = 'Dashboard'; // <title> ng page

		// $this->load->view('common/header-assets', $data); // included files
		// $this->load->view('common/lp-header', $data); // include header
		// $this->load->view('client/home', $data);	// main view file
		// $this->load->view('common/lp-footer', $data); // include footer
		// $this->load->view('common/footer-assets'); // included files
	}

	public function profile()
	{	
		$this->admin_check();
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
		$this->admin_check();

		$this->load->model('admin/m_orders');
		$data['title'] = 'Orders'; 

		$this->load->view('common/header-assets', $data); 
		$this->load->view('common/admin-header', $data); 
		$this->load->view('admin/orders', $data); 
		$this->load->view('common/footer-assets'); 
	}

	public function qoutations()
	{	
		$this->admin_check();

		$data['title'] = 'Qoutations'; 

		$this->load->view('common/header-assets', $data); 
		$this->load->view('common/admin-header', $data); 
		$this->load->view('admin/qoutations', $data); 
		$this->load->view('common/footer-assets'); 
	}

	public function collections()
	{	
		$this->admin_check();

		$data['title'] = 'Collections'; 

		$this->load->view('common/header-assets', $data); 
		$this->load->view('common/admin-header', $data); 
		$this->load->view('admin/collections', $data); 
		$this->load->view('common/footer-assets'); 
	}

	public function stock_maintenance()
	{	
		$this->admin_check();

		$this->load->model('admin/m_stock_maintenance');
		$data['title'] = 'Stock Maintenance'; 

		$this->load->view('common/header-assets', $data); 
		$this->load->view('common/admin-header', $data); 
		$this->load->view('admin/maintenance/stock-maintenance', $data); 
		$this->load->view('common/footer-assets'); 
	}


	public function quote(){
		$this->admin_check();

		$this->load->model('admin/m_quote');

		$this->load->view('admin/quote');

	}

	#*** LOGOUT ***#
	public function logout(){
		session_destroy();
		session_start();
		$this->session->set_flashdata('errors',"Logged out successful!");
		redirect('home/exec');
	}

	#****************************************#
	#
	#
	#		ADMIN-SIDE REPORT GENERATION
	#
	#
	#****************************************#

	public function sales_invoice(){
		
		$this->load->view('admin/reports/sales-invoice');

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
		$this->dompdf->stream('Sales Invoice.pdf', array("Attachment" => 0));
	}

	// public function collection_receipt(){


	// 	$this->load->view('admin/reports/collection-receipt');

	// 	// Get output html
	// 	$html = $this->output->get_output();

	// 	// Load pdf library
	// 	$this->load->library('pdf');

	// 	// Load HTML content
	// 	$this->dompdf->loadHtml($html);

	// 	// Setup paper size and orientation
	// 	$this->dompdf->setPaper('A4','landscape');
	
	// 	// Render the HTML as PDF
	// 	$this->dompdf->render();

	// 	// Output the PDF; 0 = preview; 1 = download
	// 	$this->dompdf->stream('Collection Receipt.pdf', array("Attachment" => 0));
	// }

	public function receipt_collection(){

		$this->load->view('admin/reports/quotation-report');

		$this->load->model('admin/m_invoice_collection');

		$this->load->view('admin/reports/collection-receipt');


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
		$this->dompdf->stream('Quotation Report.pdf', array("Attachment" => 0));
	}


	public function quotation_report(){

		$this->load->model('admin/m_qoutation_report');

		$this->load->view('admin/reports/quotation-report');

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
		$this->dompdf->stream('Quotation Report.pdf', array("Attachment" => 0));
	}

}
