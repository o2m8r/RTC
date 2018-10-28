<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_orders extends CI_Model{
		

		public function __construct(){
			$this->load->database();
		}

		
		public function get_orders(){ 
			$this->db->select('*');
			$this->db->from('inq_order_tbl IQT');
			$this->db->join('acc_user_tbl AUT', 'AUT.userID = IQT.userID');
			$this->db->where('IQT.order_no NOT IN(SELECT order_no FROM inv_sales_tbl)', NULL, FALSE);
			$this->db->order_by('date_created ASC, purchase_order DESC, order_no', NULL, FALSE);
			$query = $this->db->get();
			return $query->result_array();
		}


	}