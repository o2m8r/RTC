<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_invoice_collection extends CI_Model{
		

		public function __construct(){
			$this->load->database();
		}


		// insert into collection table
		public function insert_collection_tbl(){
			
			$data = array(
				'item_quantity' 		=> $this->input->post('quantity'),
				'item_name' 			=> $this->input->post('item_name'),
				'description' 			=> $this->input->post('description'),
				'specification' 		=> $this->input->post('specification')
			);

			$this->db->insert('inv_sales_tbl', $data);
			return $this->input->post('item_name');
		}

	}