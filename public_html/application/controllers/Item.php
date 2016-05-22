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

	//see peaks tglt k천ik kuulutused suvalt esitama praegu... suht aind testimiseks.
        public function index(){
        	$data['adverts'] = $this->adverts_model->get_adverts();
		$this->load_view($data, 'search');
		$advers = $this->adverts_model->get_all();
        }

	public function getpic($adverts_item){
		if ($adverts_item['pic1'] != '') { //enne oli @getimagesize($adverts_item['pic1'])
			return $adverts_item['pic1'];
		} else {
    			return "http://ostunurk.cs.ut.ee/images/piltPuudub.png";
		}			
	}
	
	public function getWatchlistLink($adverts_item){
		$username = $this->session->userdata('username');
		$number = $this->adverts_model->isInWatchList($username, $adverts_item["ID"]);
		if($number > 0){
			return '<a onclick="watchlist('.$adverts_item["ID"].')" id='.$adverts_item["ID"].'>'.$this->lang->line('WATCHLIST_REMOVE').'</a>' ; 
		}
		if($this->session->userdata('logged_in')){
			return '<a onclick="watchlist('.$adverts_item["ID"].')" id='.$adverts_item["ID"].'>'.$this->lang->line('WATCHLIST_ADD').'</a>' ; 
		}
	}

	public function getWatchlistLabel($is_add_label){
		if($is_add_label == 1){
			echo $this->lang->line('WATCHLIST_ADD');
		}else{
			echo $this->lang->line('WATCHLIST_REMOVE');
		}
	}

	public function getstuff(){
		$sorting = $this->session->userdata('sorting');
		$username = $this->session->userdata('username');
		$page = $_REQUEST["segmentnumber"];
		$offset = $_REQUEST["offset"];
		$category = $_REQUEST["category"];
		$adverts = $this->adverts_model->getNextSegment($page, $offset, $category, $username, $sorting);
		$count = count($adverts);
		echo '<div id="count" data-count="'.$count.'"></div>';
        	foreach($adverts as $adverts_item){
        	        if($adverts_item['pic1'] == ""){
        		    	$adverts_item['pic1'] = "http://ostunurk.cs.ut.ee/images/piltPuudub.png";
        		}
            		echo '<div class="advert" id="kuulutus"><table class="table">
  				<tr>
   				<th rowspan="3"><img src="'.$adverts_item['pic1'].'" alt="kuulutuse_pilt" onerror="this.src='."'".'http://ostunurk.cs.ut.ee/images/piltPuudub.png'."'".'"></th>
    				<td id="title">'.$this->lang->line('TITLE').': <a href="/index.php/item/view_advert/'.$adverts_item["ID"].'">'.$adverts_item["title"].'</a></td>
    				<td>'.$this->lang->line('SELLER').': '.$adverts_item["seller"].'</td>
  				</tr>
  				<tr>
  				'.(($adverts_item["type"] == 'avatud')?'<td>'.$this->lang->line('AD_TYPE').': '.$this->lang->line('OPEN').'</td>':'<td>'.$this->lang->line('AD_TYPE').': '.$this->lang->line('FIXED').'</td>').'
    				
    				<td></td>
  				</tr>
  				<tr>
    				<td>'.$this->lang->line('PRICE').': '.$adverts_item["price"].'</td>
    				<td>'.$this->getWatchlistLink($adverts_item).'</td>
  				</tr>
				</table></div><br />'; //siia peab selle kuulutuse tabeli asja looma... :)
        	}
	}


	
	public function addWatchlist($ID){
		$username = $this->session->userdata('username');
		$this->adverts_model->addToWatchList($username, $ID);	
	}
	
	public function removeWatchlist($ID){
		$username = $this->session->userdata('username');
		$this->adverts_model->removeFromWatchlist($username, $ID);	
	}
	
	public function isInWatchlist($ID){
		$username = $this->session->userdata('username');
		$number = $this->adverts_model->isInWatchList($username, $ID);
		echo $number;
	}
		
	
		public function dataPush(){
		$adverts = $this->adverts_model->get_last();
        	foreach($adverts as $adverts_item){
        		    if($adverts_item['pic1'] == ""){
        		    	$adverts_item['pic1'] = "http://ostunurk.cs.ut.ee/images/piltPuudub.png";
        		    }
        	            echo '<div class="advert" id="kuulutus"><table class="table">
  				<tr>
   				<th rowspan="3"><img src="'.$adverts_item['pic1'].'" alt="kuulutuse_pilt" onerror="this.src='."'".'http://ostunurk.cs.ut.ee/images/piltPuudub.png'."'".'"></th>
    				<td id="title">'.$this->lang->line('TITLE').': <a href="/index.php/item/view_advert/'.$adverts_item["ID"].'">'.$adverts_item["title"].'</a></td>
    				<td>'.$this->lang->line('SELLER').': '.$adverts_item["seller"].'</td>
  				</tr>
  				<tr>
    				'.(($adverts_item["type"] == 'avatud')?'<td>'.$this->lang->line('AD_TYPE').': '.$this->lang->line('OPEN').'</td>':'<td>'.$this->lang->line('AD_TYPE').': '.$this->lang->line('FIXED').'</td>').'
    				
    				<td></td>
  				</tr>
  				<tr>
    				<td>'.$this->lang->line('PRICE').': '.$adverts_item["price"].'</td>
    				<td>'.$this->getWatchlistLink($adverts_item).'</td>
  				</tr>
				</table></div><br />'; //siia peab selle kuulutuse tabeli asja looma... :)
        	}
	}


	//kategooria j채rgi kuulutuste otsimine
        public function view($category){
	        //lehek체ljenduse teema
	        
	        $username = $this->session->userdata('username');
		$sorting = $this->session->userdata('sorting');
		$data['adverts_segment'] = $this->adverts_model->getByOffset($this->uri->segment(4), $category, $username, $sorting); //lisada see sortimise asi mudelisse
        	$config['base_url'] = 'http://ostunurk.cs.ut.ee/index.php/item/view/'.$category;
        	$config['total_rows'] = $this->adverts_model->getTotalRows($category, $username);
        	$config['per_page'] = 30;
        	$config['num_links'] = 4;
        	$this->pagination->initialize($config);
        	
        	
        	// ('Ostunurk - Kuulutused - '.$category)
        	$data['title'] = ucfirst($this->lang->line('AD_TITLES'));
             	$sess_array = array('previous_url' => current_url());
       		$this->session->set_userdata($sess_array);	
        	if (empty($data['adverts'])){
               		//mingi teade et kuulutusi pole??
        	}
		$this->load_view($data, 'search');
        }
        
        public function change_sorting($category){
        	$this->session->set_userdata('sorting', $_POST['sort']);
       		redirect('/item/'.$category, 'refresh');
        }
        
        //mingi kindla kuulutuse avamine
        public function view_advert($ID){
                $data['adverts'] = $this->adverts_model->get_advert($ID);
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