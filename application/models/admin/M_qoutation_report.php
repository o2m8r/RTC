<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_qoutation_report extends CI_Model{
		

		public function __construct(){
			$this->load->database();
		}

		
		public function get_qoutation($id){ 
			$this->db->select('*');
			$this->db->from('inq_item_tbl IIT');
			$this->db->join('stk_item_tbl SIT', 'SIT.itemID = IIT.itemID');
			$this->db->where('IIT.order_no', $id);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_qoutation_heading($id){ 
			$this->db->select('*');
			$this->db->from('inq_order_tbl IQT');
			$this->db->join('acc_user_tbl AUT', 'AUT.userID = IQT.userID');
			$this->db->where('IQT.order_no', $id);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_qoutation_footer($id){ 
			$this->db->select('*');
			$this->db->from('inq_order_tbl IQT');
			$this->db->join('admin_tbl AT', 'AT.adminID = IQT.adminID');
			$this->db->where('IQT.order_no', $id);
			$query = $this->db->get();
			return $query->result_array();
		}


	}