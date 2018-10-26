<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_order extends CI_Model{
		

		public function __construct(){
			$this->load->database();
		}

		
		public function get_stocks(){ 
			$this->db->select('*');
			$this->db->from('stk_item_tbl');
			$query = $this->db->get();
			return $query->result_array();
		}

		// insert into inq order table
		public function insert_inq_order(){
			
			$data = array(
				'userID' 				=> $_SESSION['userID']
			);

			$this->db->insert('inq_order_tbl', $data);
			return $this->db->insert_id(); // return last id inserted
		}

		// insert into inq item table
		public function insert_item_order($inq_id){
			
			// get arrays
			$stock_id = $this->input->post('stock_id[]');
			$qty = $this->input->post('qty[]');

			$ITEM = array();
			for($i = 0; $i < count($qty); $i++){
				array_push($ITEM, array(	'itemID' 			=> $stock_id[$i],
											'order_no'			=> $inq_id, 
											'inq_quantity'		=> $qty[$i])
											//'total' ??
				);
			}
			
			return $this->db->insert_batch('inq_item_tbl', $ITEM);
		}

	}