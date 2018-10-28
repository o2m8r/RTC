<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_quote extends CI_Controller {


	// auto-load m_admin_side_nav model
	public function __construct(){
		parent::__construct();
		$this->load->model('client/m_order');
	}


    public function quote(){

        $this->form_validation->set_rules('stock_id[]', 'Stock ID', 'trim|required');
        $this->form_validation->set_rules('qty[]', 'Quantity', 'trim|required');

        if($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect('client/order');
        }else{
            $inq_id = $this->m_order->insert_inq_order();
            $this->m_order->insert_item_order($inq_id);
            redirect('client/ordered');
        }
    }

}
