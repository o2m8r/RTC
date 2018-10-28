<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_collections extends CI_Model{
		

		public function __construct(){
			$this->load->database();
		}

		public function get_pending_po(){ 
			$this->db->select('*');
			$this->db->from('inq_order_tbl IQT');
			$this->db->where('purchase_order IS NOT NULL', NULL, FALSE);
			$this->db->where('IQT.order_no NOT IN(SELECT order_no FROM inv_sales_tbl)', NULL, FALSE);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_sales_invoice_top($order_no){ 
			$this->db->select('*');
			$this->db->from('inq_order_tbl IQT');
			$this->db->join('acc_user_tbl AUT', 'AUT.userID = IQT.userID');
			$this->db->where('IQT.order_no', $order_no);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_orders($order_no){
			$this->db->select('*');
			$this->db->from('inq_item_tbl IIT');
			$this->db->join('stk_item_tbl SIT', 'SIT.itemID = IIT.itemID');
			// $this->db->join('inq_order_tbl IOT', 'IOT.order_no = IIT.order_no');
			$this->db->where('IIT.order_no', $order_no);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_total($order_no){
			$this->db->select('SUM(total) AS Total_Amount');
			$this->db->from('inq_item_tbl IIT');
			$this->db->where('IIT.order_no', $order_no);
			return $this->db->get()->row('Total_Amount');
		}

		public function get_admin($order_no){
			$this->db->select('AT.admin_name');
			$this->db->from('admin_tbl AT');
			$this->db->join('inq_order_tbl IOT', 'IOT.adminID = AT.adminID');
			$this->db->where('IOT.order_no', $order_no);
			return $this->db->get()->row('admin_name');
		}

		public function get_position($order_no){
			$this->db->select('AT.position');
			$this->db->from('admin_tbl AT');
			$this->db->join('inq_order_tbl IOT', 'IOT.adminID = AT.adminID');
			$this->db->where('IOT.order_no', $order_no);
			return $this->db->get()->row('position');
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

		// collected tab
		public function get_all_collected(){ 
			$this->db->select('*');
			$this->db->from('inv_sales_tbl IST');
			$this->db->join('inq_order_tbl IOT', 'IOT.order_no = IST.order_no');
			$this->db->join('acc_user_tbl AUT', 'AUT.userID = IOT.userID');
			$query = $this->db->get();
			return $query->result_array();
		}


	}