<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_delivered_quotations extends CI_Model{
		

		public function __construct(){
			$this->load->database();
		}

		
		public function get_heading($order_no){ 
			$this->db->select('*, SUM(IIT.total) AS Total_Amount');
			$this->db->from('inq_order_tbl IQT');
			$this->db->join('acc_user_tbl AUT', 'AUT.userID = IQT.userID');
			$this->db->join('inq_item_tbl IIT', 'IIT.order_no = IQT.order_no');
			$this->db->where('IQT.order_no', $order_no);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_items_quote($order_no){ 
			$this->db->select('*');
			$this->db->from('inq_item_tbl IIT');
			$this->db->join('stk_item_tbl SIT', 'SIT.itemID = IIT.itemID');
			$this->db->where('IIT.order_no', $order_no);
			$query = $this->db->get();
			return $query->result_array();
		}

	}