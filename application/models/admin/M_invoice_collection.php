<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_invoice_collection extends CI_Model{
		

		public function __construct(){
			$this->load->database();
		}

		public function get_total($order_no){
			$this->db->select('SUM(total) AS Total_Amount');
			$this->db->from('inq_item_tbl IIT');
			$this->db->where('IIT.order_no', $order_no);
			return $this->db->get()->row('Total_Amount');
		}

		public function get_client($order_no){
			$this->db->select('AUT.users_name');
			$this->db->from('inq_order_tbl IOT');
			$this->db->join('acc_user_tbl AUT', 'AUT.userID = IOT.userID');
			$this->db->where('IOT.order_no', $order_no);
			return $this->db->get()->row('users_name');
		}

		// insert into collection table
		public function insert_sales_tbl(){
			
			$data = array(
				'order_no' 				=> $this->input->post('order_no'),
				'invoice_no' 			=> sprintf('%06d', $this->input->post('order_no')),
				'sales_inv_amount' 		=> $this->get_total($this->input->post('order_no')),
				'date_receive' 			=> date('Y-m-d H:i:s'),
				'recipient' 			=> $this->get_client($this->input->post('order_no'))
			);

			$this->db->insert('inv_sales_tbl', $data);
			return $this->db->insert_id(); // return last id inserted
		}

		// insert into collection table
		public function insert_collection_tbl($sales_id){
			
			$data = array(
				'salesID' 				=> $sales_id,
				'check_no' 				=> $this->input->post('check_no'),
				'col_inv_amount' 		=> $this->get_total($this->input->post('order_no')),
				'col_inv_date' 			=> date('Y-m-d H:i:s'),
				'OR_no' 				=> sprintf('%06d', $sales_id)
			);

			$this->db->insert('inv_collection_tbl', $data);
			return $this->db->insert_id(); // return last id inserted
		}

		public function get_collection_data($order_no){
			$this->db->select('*, SUM(IIT.total) AS Total_Amount');
			$this->db->from('inq_order_tbl IOT');
			$this->db->join('inq_item_tbl IIT', 'IIT.order_no = IOT.order_no');
			$this->db->join('acc_user_tbl AUT', 'AUT.userID = IOT.userID');
			$this->db->join('admin_tbl AT', 'AT.adminID = IOT.adminID');
			$this->db->where('IOT.order_no', $order_no);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_old_collection_data($order_no){
			$this->db->select('*, SUM(IIT.total) AS Total_Amount');
			$this->db->from('inq_order_tbl IOT');
			$this->db->join('inq_item_tbl IIT', 'IIT.order_no = IOT.order_no');
			$this->db->join('inv_sales_tbl IST', 'IST.order_no = IOT.order_no');
			$this->db->join('inv_collection_tbl ICT', 'ICT.salesID = IST.salesID');
			$this->db->join('acc_user_tbl AUT', 'AUT.userID = IOT.userID');
			$this->db->join('admin_tbl AT', 'AT.adminID = IOT.adminID');
			$this->db->where('IOT.order_no', $order_no);
			$query = $this->db->get();
			return $query->result_array();
		}

	}