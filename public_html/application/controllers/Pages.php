<?php
class Pages extends CI_Controller {

        public function view($page = 'home')
        {
        
if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
        
        $this->load->helper('url');

        $this->load->model('adverts_model');//andmebaasi jaoks need 2 rida
        $data['adverts'] = $this->adverts_model->get_adverts();



        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
        }
}




