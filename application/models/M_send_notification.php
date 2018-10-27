<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_send_notification extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}


		public function send_email($email, $subject, $message){
			

			// start configuring email contents, GMAIL
			$config = Array(
			    'protocol' 		=> 'smtp',
			    'smtp_host' 	=> 'ssl://smtp.googlemail.com',
			    'smtp_port' 	=> 465,
			    'smtp_user' 	=> 'dbadajos50@yahoo.com',  // <-- update to
			    'smtp_pass' 	=> 'steel213',  // <-- update to
			    'mailtype'  	=> 'html', 
			    'charset'   	=> 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");

			$this->email->from('dbadajos50@gmail.com', 'dbadajos50');  // <-- update to
			$this->email->to($email);
			$this->email->cc('dbadajos50@gmail.com');  // <-- update to
			$this->email->subject($subject);
			$this->email->message($message);

			$this->email->send();
			// $this->email->print_debugger();

		}

		public function send_text(){

	        // load library
	        $this->load->library('nexmo');
	        // set response format: xml or json, default json
	        $this->nexmo->set_format('json');
	        
	        // **********************************Text Message*************************************
	        $from = '[MAFLC]';
	        $to = '639275511453';
	        $message = array(
	            'text' => 'test message',
	        );
	        $response = $this->nexmo->send_message($from, $to, $message);
	        echo "<h1>Text Message</h1>";
	        $this->nexmo->d_print($response);
	        echo "<h3>Response Code: ".$this->nexmo->get_http_status()."</h3>";

	    }

	}