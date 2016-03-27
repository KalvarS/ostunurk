<?php
class Kontakt extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
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

	$this->load->view('templates/header', $data);
        $this->load->view('pages/kontakt', $data);
        $this->load->view('templates/footer');
        }
        



}