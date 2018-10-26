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
		$this->load->model('admin/m_orders');
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

	public function stock_maintenance()
	{	
		$this->load->model('admin/m_stock_maintenance');
		$data['title'] = 'Stocks Maintenance'; 

		$this->load->view('common/header-assets', $data); 
		$this->load->view('common/admin-header', $data); 
		$this->load->view('admin/maintenance/stock-maintenance', $data); 
		$this->load->view('common/footer-assets'); 
	}


	public function qoute(){
		$this->load->model('admin/m_qoute');

		$this->load->view('admin/qoute');

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

	public function collection_receipt(){

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
		$this->dompdf->stream('Collection Receipt.pdf', array("Attachment" => 0));
	}

	public function quotation_report(){

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
