<?php
class Pages extends CI_Controller {

        public function view($page = 'home'){
		if ($page != 'home'){//selle kontrolleriga laseme ainult kodulehte kuvada.
                // Blokeerime otse lehtedele minekut, aind kontrollerid annavad meile lehti ette.
          	      //show_404();
        	}
       		$this->load->helper('url');
		$this->load->helper('form');	
		$this->load->library('form_validation');
                $this->load->library('session');
		
        	$this->load->model('adverts_model');//andmebaasi jaoks need 2 rida
        	$data['adverts'] = $this->adverts_model->get_adverts();
        	
        	$data['categories'] = $this->adverts_model->get_categories();


                $sess_array = array('previous_url' => current_url());
       	        $this->session->set_userdata($sess_array);

        	$data['title'] = ucfirst($this->lang->line('MAIN_TITLE'));
        	
        	$this->load->view('templates/header', $data);
        	$this->load->view('templates/left_menu', $data);
        	$this->load->view('pages/'.$page, $data);
        	if($this->session->userdata('logged_in')){
     			$session_data = $this->session->userdata('logged_in');
     			$data['username'] = $session_data['username'];
     			$this->load->view('templates/right_menu_user', $data);
 		}else{
     			$this->load->view('templates/right_menu', $data);
   		}
        		$this->load->view('templates/footer', $data);
       		}
        
        
        	function logout(){
   			$this->session->unset_userdata('logged_in');
   			session_destroy();
   			redirect('home');
 		}
}
