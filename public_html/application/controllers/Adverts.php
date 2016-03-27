<?php
class Adverts extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('adverts_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
        $data['adverts'] = $this->adverts_model->get_adverts();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/search', $data);
        $this->load->view('templates/footer');
        }

        public function view($category)
        {
        
        $data['adverts'] = $this->adverts_model->get_adverts($category);
        if (empty($data['adverts']))
        {
               
        }

	
        $this->load->view('templates/header', $data);
        $this->load->view('pages/search', $data);
        $this->load->view('templates/footer');
        }
        
        public function view_advert($ID)
        {
        
        $data['adverts'] = $this->adverts_model->get_advert($ID);


	
        $this->load->view('templates/header', $data);
        $this->load->view('pages/viewadvert', $data);
        $this->load->view('templates/footer');
        }


}