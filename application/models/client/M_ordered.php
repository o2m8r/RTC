<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_ordered extends CI_Model{
		

		public function __construct(){
			$this->load->database();
		}

		public function get_ordered(){ 
			$this->db->select('*');
			$this->db->from('inq_order_tbl IOT');
			$this->db->where('IOT.order_no NOT IN(SELECT order_no FROM inv_sales_tbl)', NULL, FALSE);
			$this->db->order_by('date_created ASC, purchase_order DESC, order_no', NULL, FALSE);
			$query = $this->db->get();
			return $query->result_array();
		}

		// collected tab
		public function get_all_collected(){ 
			$this->db->select('*, SUM(IIT.total) AS Total_Amount, SUM(IIT.inq_quantity) AS Total_Items');
			$this->db->from('inv_sales_tbl IST');
			$this->db->join('inq_order_tbl IOT', 'IOT.order_no = IST.order_no');
			$this->db->join('inq_item_tbl IIT', 'IIT.order_no = IST.order_no');
			$this->db->join('acc_user_tbl AUT', 'AUT.userID = IOT.userID');
			$this->db->where('AUT.userID', $_SESSION['userID']);
			$this->db->group_by('IOT.order_no');
			$query = $this->db->get();
			return $query->result_array();
		}


	}