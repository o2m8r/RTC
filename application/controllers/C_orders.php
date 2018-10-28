<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_orders extends CI_Controller {


	// auto-load m_admin_side_nav model
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/m_quote');
	}


    public function quote(){

        $this->form_validation->set_rules('item_id[]', 'Item ID', 'trim|required');
        $this->form_validation->set_rules('qoutation[]', 'Qoutation', 'trim|required');

        if($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect('admin/orders');
        }else{
            $inq_id = $this->m_quote->insert_qoutation();
            $this->m_quote->update_order_tbl();
            redirect('admin/orders');
        }
    }

}
