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
			$query = $this->db->get();
			return $query->result_array();
		}


	}