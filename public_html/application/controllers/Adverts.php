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
        $data['title'] = 'Adverts';

        $this->load->view('templates/header', $data);
        $this->load->view('adverts/index', $data);
        $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                 $data['adverts_item'] = $this->adverts_model->get_adverts($slug);

        if (empty($data['adverts_item']))
        {
                show_404();
        }

        $data['title'] = $data['adverts_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('adverts/view', $data);
        $this->load->view('templates/footer');
        }


}