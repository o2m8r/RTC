<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_qoutation_report extends CI_Model{
		

		public function __construct(){
			$this->load->database();
		}

		
		public function get_qoutation($id){ 
			$this->db->select('*');
			$this->db->from('inq_order_tbl IQT');
			$this->db->where('IQT.order_no', $id);
			$query = $this->db->get();
			return $query->result_array();
		}


	}