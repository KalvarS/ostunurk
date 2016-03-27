<?php
class Adverts_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }



public function get_adverts($category = FALSE)
{
        if ($category === FALSE)
        {
                $query = $this->db->get('kuulutus');
                return $query->result_array();
        }

        $query = $this->db->get_where('kuulutus', array('kategooria' => $category));
        return $query->result_array();
}

function insert_advert($advert) {
$sql = "INSERT INTO kuulutus (pealkiri, hind, kirjeldus, kuulutuse_tyyp, kategooria, pilt1, pilt2, pilt3, pilt4, ID, myyja) VALUES ('$advert[pealkiri]', '$advert[hind]','$advert[kirjeldus]','$advert[kuulutuse_tyyp]','$advert[kategooria]','$advert[pilt1]','$advert[pilt2]','$advert[pilt3]','$advert[pilt4]',NULL, NULL);"; //ID on null, kuna autoincement ja myyja on ka ajutiselt null, kuna pole logimise süsteemi veel

$query = $this->db->query($sql);

if($query === TRUE){
	return TRUE;
}else{
	$last_query = $this->db->last_query();
	return $last_query;
}
}


public function get_advert($advert_ID){
	$query = $this->db->get_where('kuulutus', array('ID' => $advert_ID));
	return $query->result_array();
}
}

?>