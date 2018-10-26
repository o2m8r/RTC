<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_ordered extends CI_Model{
		

		public function __construct(){
			$this->load->database();
		}

		
		public function get_ordered(){ 
			$this->db->select('*');
			$this->db->from('inq_order_tbl');
			$query = $this->db->get();
			return $query->result_array();
		}


	}