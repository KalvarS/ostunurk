<?php
class Kontakt extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->load->model('adverts_model');
		$this->load->helper('form');	
		$this->load->library('form_validation');
		$this->load->library('session');
		
		
		
        } 

        public function index()
        {





	$this->load->library('googlemaps');


	$config['center'] = '58.3782196,26.7147994';	
	$config['zoom'] = '17';
	$this->googlemaps->initialize($config);

	$marker = array();
	$marker['position'] = '58.3782196,26.7147994';
	$this->googlemaps->add_marker($marker);
	$data['map'] = $this->googlemaps->create_map();

        $data['title'] = ucfirst($this->lang->line('KONTAKT_PEALKIRI'));
        $data['categories'] = $this->adverts_model->get_categories();
	$this->load->view('templates/header', $data);
        $this->load->view('templates/left_menu', $data);
        $this->load->view('pages/kontakt', $data);
        
        if($this->session->userdata('logged_in')){
     		$session_data = $this->session->userdata('logged_in');
     		$data['username'] = $session_data['username'];
     		$this->load->view('templates/right_menu_user', $data);
 	}else{
     	$this->load->view('templates/right_menu', $data);
   	}
   
        $this->load->view('templates/footer');
        }
        



}