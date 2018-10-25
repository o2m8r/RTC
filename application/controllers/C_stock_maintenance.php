<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_stock_maintenance extends CI_Controller {


	// auto-load m_admin_side_nav model
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/m_stock_maintenance');
	}

	public function upload_image(){
		//upload configuration

        list($type, $extension) = explode('/', $_FILES['item_image']['type']);
		
		$config['file_name']   = uniqid('', true).'.'.strtolower($extension);
        $config['upload_path']   = 'uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']      = 1024;
        $this->load->library('upload', $config);
        //upload file to directory
        if($this->upload->do_upload('item_image')){
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
        $mime = get_mime_by_extension($_FILES['item_image']['name']);
        if(isset($_FILES['item_image']['name']) && $_FILES['item_image']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only jpeg/jpg/png file for your item image.');
                return false;
            }
        }
    }

	public function create(){

		$this->form_validation->set_rules('item_image', 'Item Image', 'callback_file_check');
		$this->form_validation->set_rules('item_name', 'Item Name', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('specification', 'Specification', 'trim|required');

		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('errors', validation_errors());
			redirect('admin/stock-maintenance');
		}else{
			$name = $this->m_stock_maintenance->create_stock($this->upload_image());
			$this->session->set_flashdata("msg", "M.toast({html: '\'".$name."\' successfully added!', classes: 'rounded'});");
			redirect('admin/stock-maintenance');

		}
	}

}
