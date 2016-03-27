<?php

class Form extends CI_Controller {

	function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('adverts_model');

		$this->form_validation->set_rules('adverttitle', 'Pealkiri', 'required|min_length[5]');
		$this->form_validation->set_rules('adverttype', 'Kuulutuse Tüüp', 'required');
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
			$this->load->view('templates/header');
			$this->load->view('pages/addadvert');
			$this->load->view('templates/footer');
		}
		else
		{
			$advert_array = array(
				'pealkiri'     => $this->input->post('adverttitle'),
				'hind'     => $this->input->post('price'),
				'kirjeldus'     => $this->input->post('description'),
				'kuulutuse_tyyp'     => $this->input->post('adverttype'),
				'kategooria'     => $this->input->post('categories'),
				'pilt1'     => $this->input->post('pic1'),
				'pilt2'     => $this->input->post('pic2'),
				'pilt3'     => $this->input->post('pic3'),
				'pilt4'     => $this->input->post('pic4'),
				'ID'     => NULL,
				'myyja'     => $this->input->post('Troll49'),			
			);
			
			$insert_advert = $this->adverts_model->insert_advert($advert_array);
			
			$data['adverttitle'] = $this->input->post('adverttitle');
			$data['adverttype'] = $this->input->post('adverttype');
			$data['categories'] = $this->input->post('categories');
			$data['description'] = $this->input->post('description');
			$data['pic1'] = $this->input->post('pic1');
			$data['pic2'] = $this->input->post('pic2');
			$data['pic3'] = $this->input->post('pic3');
			$data['pic4'] = $this->input->post('pic4');
			$this->load->view('templates/header');
			$this->load->view('pages/formsuccess', $data);
			$this->load->view('templates/footer');
		}
	}
	
	public function insert_advert(){
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->helper('form_validation');
	
	}
}
?>