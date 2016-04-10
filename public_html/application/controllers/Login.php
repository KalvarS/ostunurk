<?php

class Login extends CI_Controller {
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
 	
 	function index(){
 		if($this->session->userdata('logged_in')){ //sisseloginutele ei luba uuesti sisse logimist.
			redirect($this->session->userdata('previous_url'), 'refresh');    			
 		}else{
 	 		$data['title'] = ucfirst($this->lang->line('LOGIN_TITLE'));
 			$this->load->view('templates/header', $data);
 			$this->load->view('pages/login');
 			$this->load->view('templates/footer');
 		}
 	}
 	
 	function login_form(){
   		$this->form_validation->set_rules('login_username', 'Kasutajanimi', 'trim|required');
   		$this->form_validation->set_rules('login_password', 'Parool', 'trim|required|callback_check_database');
		if ($this->form_validation->run() == FALSE){
                        $data['title'] = ucfirst($this->lang->line('LOGIN_TITLE'));
			$this->load->view('templates/header', $data);
			$this->load->view('pages/login');
			$this->load->view('templates/footer');
		}else{		
			redirect($this->session->userdata('previous_url'), 'refresh');
			
		}
 	}
 
	function check_database($password){
   		$username = $this->input->post('login_username');
   		$result = $this->user->login($username, $password);
   		if($result){
     			$sess_array = array();
     			foreach($result as $row){
       				$sess_array = array(
         			'personal_ID' => $row->personal_ID,
         			'username' => $row->username,
         			'logged_in' => TRUE,
       				);
       				$this->session->set_userdata($sess_array);
     			}
     			return TRUE;
   		}else{
     			$this->form_validation->set_message('check_database', 'Invalid username or password');
     			return false;
   		}
 	}

}


?>