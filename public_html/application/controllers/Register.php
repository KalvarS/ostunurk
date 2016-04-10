<?php
class Register extends CI_Controller {

        
        public function index(){
        	$this->load->helper('url');
		$this->load->helper('form');	
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->view('templates/header');
		$this->load->view('pages/register');
		$this->load->view('templates/footer');
        }
}