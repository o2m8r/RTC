<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_purchase_order extends CI_Controller {


	// auto-load m_admin_side_nav model
	public function __construct(){
		parent::__construct();
		$this->load->model('client/m_purchase_order');
	}

    public function upload_image(){
        //upload configuration

        list($type, $extension) = explode('/', $_FILES['purchase_order']['type']);
        
        $config['file_name']   = uniqid('', true).'.'.strtolower($extension);
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']      = 1024;
        $this->load->library('upload', $config);
        //upload file to directory
        if($this->upload->do_upload('purchase_order')){
            $uploadData = $this->upload->data();
            $uploadedFile = $uploadData['file_name'];
            return $uploadedFile;
        }else{
            return 'default-avatar.jpg';
        }
    }
    /*
     * file value and type check during validation
     */
    public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['purchase_order']['name']);
        if(isset($_FILES['purchase_order']['name']) && $_FILES['purchase_order']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only jpeg/jpg/png file for your item image.');
                return false;
            }
        }
    }



    public function upload_po(){

        $this->form_validation->set_rules('order_no', 'Order No', 'trim|required');
        $this->form_validation->set_rules('purchase_order', 'Purchase Order Image', 'callback_file_check');

        if($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect('client/ordered');
        }else{
            // $inq_id = $this->m_order->insert_inq_order();
            $this->m_purchase_order->upload_po($this->upload_image());
            redirect('client/ordered');
        }
    }

}
