<?php
class Item extends CI_Controller {

        public function __construct(){
                parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');	
		$this->load->library('form_validation');		
                $this->load->model('adverts_model');
                $this->load->helper('url_helper');
                $this->load->library('pagination');
                $this->load->library('table');
        }
       

	//see peaks tglt kõik kuulutused suvalt esitama praegu... suht aind testimiseks.
        public function index(){
        	$data['adverts'] = $this->adverts_model->get_adverts();
		$this->load_view($data, 'search');
        }

	public function getpic($adverts_item){
		if($adverts_item["pic1"] != "" && $adverts_item["pic1"] != null){
			return $adverts_item["pic1"];
		}else{ 
			return "http://ostunurk.cs.ut.ee/images/Ostunurk.png"; 
		}
	}

	public function getstuff(){
		$page = $_REQUEST["segmentnumber"];
		$offset = $_REQUEST["offset"];
		$category = $_REQUEST["category"];
		$adverts = $this->adverts_model->getNextSegment($page, $offset, $category);
		$count = count($adverts);
		echo '<div id="count" data-count="'.$count.'"></div>';
        	foreach($adverts as $adverts_item){
            		echo '<div class="advert"><table class="table">
  				<tr>
   				<th rowspan="3"><img src="'.$this->getpic($adverts_item).'" alt="kuulutuse_pilt">			</th>
    				<td>'.$this->lang->line('TITLE').': <a href="/index.php/item/view_advert/'.$adverts_item["ID"].'">'.$adverts_item["title"].'</a></td>
    				<td>'.$this->lang->line('SELLER').': '.$adverts_item["seller"].'</td>
  				</tr>
  				<tr>
    				<td>'.$this->lang->line('AD_TYPE').': '.$adverts_item["type"].'</td>
    				<td></td>
  				</tr>
  				<tr>
    				<td>'.$this->lang->line('PRICE').': '.$adverts_item["price"].'</td>
    				<td><a href="viga.">'.$this->lang->line('WATCHLIST_ADD').'</a></td>
  				</tr>
				</table></div><br />'; //siia peab selle kuulutuse tabeli asja looma... :)
        	}
	}


	//kategooria järgi kuulutuste otsimine
        public function view($category){
	        //leheküljenduse teema 
		$data['adverts_segment'] = $this->adverts_model->getByOffset($this->uri->segment(4), $category);
        	$config['base_url'] = 'http://ostunurk.cs.ut.ee/index.php/item/view/'.$category;
        	$config['total_rows'] = $this->adverts_model->getTotalRows($category);
        	$config['per_page'] = 30;
        	$config['num_links'] = 4;
        	$this->pagination->initialize($config);
        	
        	
        	// ('Ostunurk - Kuulutused - '.$category)
        	$data['title'] = ucfirst($this->lang->line('AD_TITLES'));
             	$sess_array = array('previous_url' => current_url());
       		$this->session->set_userdata($sess_array);	
       		//$data['adverts'] = $this->adverts_model->get_adverts($category);
        	if (empty($data['adverts'])){
               		//mingi teade et kuulutusi pole??
        	}
		$this->load_view($data, 'search');
        }
        
        //mingi kindla kuulutuse avamine
        public function view_advert($ID){
                $data['adverts'] = $this->adverts_model->get_advert($ID);
                //('Ostunurk - Kuulutus - ID:'.$ID);
        	$data['title'] = ucfirst($this->lang->line('AD_TITLE'));
             	$sess_array = array('previous_url' => current_url());
       		$this->session->set_userdata($sess_array);
		$this->load_view($data, 'viewadvert');
        }

	//siia peaks mingi searchengine teema tulema
	public function search(){
  		$this->load_view($data, 'search');
	}
	
	
	//vaate laadimiseks
	public function load_view($data, $page){
	        $data['categories'] = $this->adverts_model->get_categories();
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
   		
        	$this->load->view('templates/footer');
	}

}