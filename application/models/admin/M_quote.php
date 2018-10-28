<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_quote extends CI_Model{
		

		public function __construct(){
			$this->load->database();
		}

		public function format_amount($amount){
			$amount = str_replace('₱', '', $amount);
			$amount = str_replace(',', '', $amount);
			$amount = str_replace(' ', '', $amount);
			return $amount;
		}
		
		public function get_items($order_no){ 
			$this->db->select('*');
			$this->db->from('inq_order_tbl IOT');
			$this->db->join('inq_item_tbl IIT', 'IIT.order_no = IOT.order_no');
			$this->db->join('stk_item_tbl SIT', 'SIT.itemID = IIT.itemID');
			$this->db->where('IOT.order_no', $order_no);
			$query = $this->db->get();
			return $query->result_array();
		}

		// update content
		public function update_order_tbl(){
			$data = array(
				'adminID'			=> $_SESSION['adminID'], // admin ID
				'date_created' 		=> date('Y-m-d H:i:s'),
				'delivery'			=> $this->input->post('delivery'),
				'terms'				=> $this->input->post('terms'),
				'price_validity'	=> $this->input->post('price_validity')
			);

			$this->db->where('order_no', $this->input->post('order_no'));
			$this->db->update('inq_order_tbl', $data);
		}


		public function insert_qoutation(){

			// get arrays
			$order_no 	= $this->input->post('order_no');
			$item_id 	= $this->input->post('item_id[]');
			$qoutation 	= $this->input->post('qoutation[]');
			$inq_qty 	= $this->input->post('inq_qty[]');

			for($i = 0; $i < count($item_id); $i++){
				$total = $inq_qty[$i] * format_amount($qoutation[$i]);

				$data = array(
					'total'			=> $total,
					'quotation' 	=> format_amount($qoutation[$i])
				);

				$this->db->where('inq_itemID', $item_id[$i]);
				$this->db->update('inq_item_tbl', $data);
			}
		}


	}