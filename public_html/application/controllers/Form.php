<?php

class Form extends CI_Controller {
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
 



	function register(){
		$data['title'] = ucfirst($this->lang->line('REG_TITLE'));
                $data['categories'] = $this->adverts_model->get_categories();
		$this->form_validation->set_rules('new_username', 'Kasutajanimi', 'trim|required|is_unique[user.username]|min_length[3]|max_length[18]|alpha_dash');
		$this->form_validation->set_rules('new_password', 'Parool', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('new_password_again', 'Parool uuesti', 'trim|required|matches[new_password]');
		$this->form_validation->set_rules('new_email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('new_firstname', 'Eesnimi', 'trim|required|alpha');
		$this->form_validation->set_rules('new_lastname', 'Perekonnanimi', 'trim|required|alpha');
		$this->form_validation->set_rules('new_phone', 'Tel nr', 'trim|required|numeric');
		$this->form_validation->set_rules('new_personal_id', 'Isikukood', 'trim|required|numeric|is_unique[user.personal_ID]');
		
		
		if($this->session->userdata('logged_in')){ //sisseloginutele ei luba regamist. peab esamlt v채lja logima.
			redirect(base_url(), 'refresh');    			
 		}else{
   			if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('pages/register');
			$this->load->view('templates/footer');
		}
		else
		{
			$user_array = array(
				'username'     => $this->input->post('new_username'),
				'password'     => $this->input->post('new_password'),
				'email'     => $this->input->post('new_email'),
				'firstname'     => $this->input->post('new_firstname'),
				'lastname'     => $this->input->post('new_lastname'),
				'phone'     => $this->input->post('new_phone'),
				'personal_ID'     => $this->input->post('new_personal_id'),	
			);
			
			$insert_advert = $this->register_model->create_new_user($user_array);
                        redirect(base_url(), 'refresh');
        	}
   		}
	}

	
	function edit_advert($advert_ID){
		$data['title'] = ucfirst($this->lang->line('EDIT_ADD'));
		$data['advert'] = $this->adverts_model->get_advert($advert_ID);
		foreach ($data['advert'] as $item) {
			$ID = $item['ID'];
			$title = $item['title'];
			$price = $item['price'];
			$description = $item['description'];
			$type = $item['type'];
			$category = $item['category'];
			$pic1 = $item['pic1'];
			$pic2 = $item['pic2'];
			$pic3 = $item['pic3'];
			$pic4 = $item['pic4'];
            		$seller = $item['seller'];
        	}
		if(!$this->session->userdata('logged_in')){//teeme mitte sisseloginutele selle funktsionaalsuse k채ttesaamatuks, viskame logimise lehe ette...
     			$sess_array = array('previous_url' => current_url());
       			$this->session->set_userdata($sess_array);
       			redirect('login/login_form', 'refresh'); //suunatakse logimise lehele
     		}else if($this->session->userdata('username') != $seller){//kui kasutaja üritab muuta kellegi teise kuultuust
     			redirect('http://ostunurk.cs.ut.ee/', 'refresh');
     		}else{
     		$data['title'] = ucfirst($this->lang->line('ADD_TITLE'));
		$this->form_validation->set_rules('adverttitle', 'Pealkiri', 'required|min_length[5]|max_length[40]');
		$this->form_validation->set_rules('adverttype', 'Kuulutuse T체체p', 'required');
		$this->form_validation->set_rules('categories', 'Kategooria', 'required');
		$this->form_validation->set_rules('description', 'Kirjeldus', 'required|min_length[40]');
		$this->form_validation->set_rules('price', 'Hind', 'required|numeric');
		$this->form_validation->set_rules('pic1', 'Pilt 1', '');
		$this->form_validation->set_rules('pic2', 'Pilt 2', '');
		$this->form_validation->set_rules('pic3', 'Pilt 3', '');
		$this->form_validation->set_rules('pic4', 'Pilt 4', '');
		$this->form_validation->set_rules('url', 'URL', 'required');
		     		


		if ($this->form_validation->run() == FALSE)
		{
                        $data['categories'] = $this->adverts_model->get_categories();
			$this->load->view('templates/header', $data);
                        $this->load->view('templates/left_menu', $data);
			$this->load->view('pages/addadvert', $data);
                        if($this->session->userdata('logged_in')){
     				$session_data = $this->session->userdata('logged_in');
     				$data['username'] = $session_data['username'];
     				$this->load->view('templates/right_menu_user', $data);
 			}else{
     				$this->load->view('templates/right_menu', $data);
   			}
			$this->load->view('templates/footer');

		}else{
			$advert_array = array(
				'title'     => $this->input->post('adverttitle'),
				'price'     => $this->input->post('price'),
				'description'     => $this->input->post('description'),
				'type'     => $this->input->post('adverttype'),
				'category'     => $this->input->post('categories'),
				'pic1'     => $this->input->post('pic1'),
				'pic2'     => $this->input->post('pic2'),
				'pic3'     => $this->input->post('pic3'),
				'pic4'     => $this->input->post('pic4'),
				'ID'     => $ID,
			);
			
			$edit_advert = $this->adverts_model->edit_advert($advert_array);
       			redirect('item/view_advert/'.$ID, 'refresh'); //suunatakse logimise lehele
                } 
        	}
	}
	
	function delete_advert($advert_ID){
                $data['title'] = ucfirst($this->lang->line('DELETE_ADVERT'));
		$data['advert'] = $this->adverts_model->get_advert($advert_ID);
		$data['advert_ID'] = $advert_ID;
		foreach ($data['advert'] as $item) {
			$ID = $item['ID'];
            		$seller = $item['seller'];
        	}
		if(!$this->session->userdata('logged_in')){//teeme mitte sisseloginutele selle funktsionaalsuse k채ttesaamatuks, viskame logimise lehe ette...
     			$sess_array = array('previous_url' => current_url());
       			$this->session->set_userdata($sess_array);
       			redirect('login/login_form', 'refresh'); //suunatakse logimise lehele
     		}else if($this->session->userdata('username') != $seller){//kui kasutaja üritab kustutada kellegi teise kuultuust
     			redirect('http://ostunurk.cs.ut.ee/', 'refresh');
     		}else{
     		        $data['categories'] = $this->adverts_model->get_categories();
			$this->load->view('templates/header', $data);
                        $this->load->view('templates/left_menu', $data);
			$this->load->view('pages/confirmdelete', $data);
                        if($this->session->userdata('logged_in')){
     				$session_data = $this->session->userdata('logged_in');
     				$data['username'] = $session_data['username'];
     				$this->load->view('templates/right_menu_user', $data);
 			}else{
     				$this->load->view('templates/right_menu', $data);
   			}
        			$this->load->view('templates/footer', $data);
        	}
	}
	
	function delete($advert_ID){
                $data['title'] = ucfirst($this->lang->line('DELETE_ADVERT'));
		$data['advert'] = $this->adverts_model->get_advert($advert_ID);
		$data['advert_ID'] = $advert_ID;
		foreach ($data['advert'] as $item) {
			$ID = $item['ID'];
            		$seller = $item['seller'];
        	}
		if(!$this->session->userdata('logged_in')){//teeme mittesisseloginutele selle funktsionaalsuse k채ttesaamatuks, viskame logimise lehe ette...
     			$sess_array = array('previous_url' => current_url());
       			$this->session->set_userdata($sess_array);
       			redirect('login/login_form', 'refresh'); //suunatakse logimise lehele
     		}else if($this->session->userdata('username') != $seller){//kui kasutaja üritab kustutada kellegi teise kuultuust
     			redirect('http://ostunurk.cs.ut.ee/', 'refresh');
     		}else{
     			$this->adverts_model->delete_advert($advert_ID);	
                        $data['categories'] = $this->adverts_model->get_categories();
			$this->load->view('templates/header', $data);
                        $this->load->view('templates/left_menu', $data);
			$this->load->view('pages/itemdeleted', $data);
                        if($this->session->userdata('logged_in')){
     				$session_data = $this->session->userdata('logged_in');
     				$data['username'] = $session_data['username'];
     				$this->load->view('templates/right_menu_user', $data);
 			}else{
     				$this->load->view('templates/right_menu', $data);
   			}
        			$this->load->view('templates/footer', $data);
     		}
	}
	


	function add_advert(){
		$data['advert']['ID'] = -1; //tähendab, et me loome uut kuulutust mitte ei muuda mingit olemasolevat...
                $data['title'] = ucfirst($this->lang->line('ADD_TITLE'));
		if(!$this->session->userdata('logged_in')){//teeme mitte sisseloginutele selle funktsionaalsuse k채ttesaamatuks, viskame logimise lehe ette...
     			$sess_array = array('previous_url' => current_url());
       			$this->session->set_userdata($sess_array);
       			redirect('login/login_form', 'refresh'); //suunatakse logimise lehele
     		}
		$this->form_validation->set_rules('adverttitle', 'Pealkiri', 'required|min_length[5]|max_length[40]');
		$this->form_validation->set_rules('adverttype', 'Kuulutuse T체체p', 'required');
		$this->form_validation->set_rules('categories', 'Kategooria', 'required');
		$this->form_validation->set_rules('description', 'Kirjeldus', 'required|min_length[40]');
		$this->form_validation->set_rules('price', 'Hind', 'required|numeric');
		$this->form_validation->set_rules('pic1', 'Pilt 1', '');
		$this->form_validation->set_rules('pic2', 'Pilt 2', '');
		$this->form_validation->set_rules('pic3', 'Pilt 3', '');
		$this->form_validation->set_rules('pic4', 'Pilt 4', '');
		$this->form_validation->set_rules('url', 'URL', 'required');
	

		if ($this->form_validation->run() == FALSE)
		{
                        $data['categories'] = $this->adverts_model->get_categories();
			$this->load->view('templates/header', $data);
                        $this->load->view('templates/left_menu', $data);
			$this->load->view('pages/addadvert', $data);
                        if($this->session->userdata('logged_in')){
     				$session_data = $this->session->userdata('logged_in');
     				$data['username'] = $session_data['username'];
     				$this->load->view('templates/right_menu_user', $data);
 			}else{
     				$this->load->view('templates/right_menu', $data);
   			}
			$this->load->view('templates/footer');
		}else{
			$advert_array = array(
				'title'     => $this->input->post('adverttitle'),
				'price'     => $this->input->post('price'),
				'description'     => $this->input->post('description'),
				'type'     => $this->input->post('adverttype'),
				'category'     => $this->input->post('categories'),
				'pic1'     => $this->input->post('pic1'),
				'pic2'     => $this->input->post('pic2'),
				'pic3'     => $this->input->post('pic3'),
				'pic4'     => $this->input->post('pic4'),
				'ID'     => NULL,
				'seller'     => $this->input->post('username'),		
			);
			
			$insert_advert = $this->adverts_model->insert_advert($advert_array);
			

                        $data['categories'] = $this->adverts_model->get_categories();
			$this->load->view('templates/header', $data);
                        $this->load->view('templates/left_menu', $data);
			$this->load->view('pages/formsuccess', $data);
                        if($this->session->userdata('logged_in')){
     				$session_data = $this->session->userdata('logged_in');
     				$data['username'] = $session_data['username'];
     				$this->load->view('templates/right_menu_user', $data);
 			}else{
     				$this->load->view('templates/right_menu', $data);
   			}
        			$this->load->view('templates/footer', $data);
        	}
	}
}


?>