<?php

class Authentication extends CI_Controller {
	function __construct(){
	   	parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');	
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('adverts_model');
		$this->load->model('register_model');
		$this->load->model('user','',TRUE);
	 }
 
 	function auth_facebook(){
   		$this->form_validation->set_rules('login_username', 'Kasutajanimi', 'trim|required');
   		$this->form_validation->set_rules('login_password', 'Parool', 'trim|required|callback_check_database');
  		$url = $this->input->post('url');
		$this->form_validation->run();
		redirect($url, 'refresh'); 
 	}
 
 }


?>