<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_authentication extends CI_Controller {


	// auto-load m_admin_side_nav model
	public function __construct(){
		parent::__construct();
		$this->load->model('m_authentication');
	}

	public function inquire(){

        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('institution', 'Intitution', 'trim|required');
        $this->form_validation->set_rules('institution_address', 'Intitution Address', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim');
        $this->form_validation->set_rules('landline', 'Landline', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|matches[password]');

        if($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect('home/index');
        }else{
            $email = $this->m_authentication->inquire();
            $this->session->set_flashdata("msg", "M.toast({html: '\'".$email."\' successfully registered!', classes: 'rounded'});");
            redirect('home/index');

        }
    }

    public function login(){

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect('home/index');
        }else{
            $email = $this->m_authentication->login();
            #$this->session->set_flashdata("msg", "M.toast({html: '\'".$email."\' successfully registered!', classes: 'rounded'});");
            #redirect('home/index');

        }
    }

    public function update(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('institution', 'Institution', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required');
        $this->form_validation->set_rules('landline', 'Landline', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect('client/profile');
        }else{
            $name = $this->m_authentication->update_profile();
            $this->session->set_flashdata("msg", "M.toast({html: '\'".$name."\' successfully added!', classes: 'rounded'});");
            redirect('client/profile');
        }

    }

}
