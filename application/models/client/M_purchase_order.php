<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_purchase_order extends CI_Model{
		

		public function __construct(){
			$this->load->database();
		}

		
		public function upload_po($file_name){ 
			$data = array(
				'purchase_order' 				=> $file_name
			);

			
			$this->db->where('order_no', $this->input->post('order_no'));
			$this->db->update('inq_order_tbl', $data);
		}


	}