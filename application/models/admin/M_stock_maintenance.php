<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_stock_maintenance extends CI_Model{
		

		public function __construct(){
			$this->load->database();
		}

		public function get_stocks(){ 
			$this->db->select('*');
			$this->db->from('stk_item_tbl');
			$query = $this->db->get();
			return $query->result_array();
		}


		// insert into collateral table
		public function create_stock($file_name){
			
			$data = array(
				'picture' 				=> $file_name,
				'item_quantity' 		=> $this->input->post('quantity'),
				'item_name' 			=> $this->input->post('item_name'),
				'description' 			=> $this->input->post('description'),
				'specification' 		=> $this->input->post('specification')
			);

			$this->db->insert('stk_item_tbl', $data);
			return $this->input->post('item_name');
		}

		// update stock
		public function update_stock(){
			$data = array(
				'item_name' 		=> $this->input->post('item_name'),
		        'description' 		=> $this->input->post('description'),
		        'specification' 	=> $this->input->post('specification'),
		        'item_quantity' 	=> $this->input->post('quantity'),
		        'type' 				=> $this->input->post('type')
			);

			$this->db->where('itemID', $this->input->post('itemID'));
			$this->db->update('stk_item_tbl', $data);
			return $this->db->affected_rows();
		}

		//delete stock
		public function delete_stock(){
			$this->db->where('itemID', $this->input->post('itemID'));
			$this->db->delete('stk_item_tbl');
			return $this->db->affected_rows();
		}

		// update content
		public function update_collateral(){
			$data = array(
				'Description' 			=> $this->input->post('updatedCollateralName'),
				'Date_Modified' 		=> date('Y-m-d H:i:s'),
				'Acct_User_ID' 			=> $_SESSION['id']
			);

			$this->db->where_in('Collateral_ID', $this->input->post('collateralID'));
			$this->db->update('collateral_tbl', $data);
			return $this->db->affected_rows();
		}

	}