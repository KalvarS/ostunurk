<?php
class Adverts_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

public function get_categories(){
$sql = "SELECT category, COUNT(*) AS sum FROM item GROUP BY category";
$query = $this->db->query($sql);
return $query->result_array();
}

public function get_adverts($category = FALSE)
{
        if ($category === FALSE)
        {
                $query = $this->db->get('item');
                return $query->result_array();
        }
	$sql = "SELECT * FROM view_item_search_info WHERE category = '".$category."'";
        $query = $this->db->query($sql);
        return $query->result_array();
}

function insert_advert($advert) {
$sql = "CALL new_item_advert(NULL,'$advert[title]', '$advert[price]','$advert[title]','$advert[type]','$advert[category]','$advert[pic1]','$advert[pic2]','$advert[pic3]','$advert[pic4]','$advert[seller]')";
$query = $this->db->query($sql);

if($query === TRUE){
	return TRUE;
}else{
	$last_query = $this->db->last_query();
	return $last_query;
}
}


public function get_advert($advert_ID){
	$sql = "SELECT * FROM view_item_advert_info WHERE ID = '".$advert_ID."'";
	$query = $this->db->query($sql);
	return $query->result_array();
}

public function search_advert(){
	$sql = "SELECT * FROM view_item_search_info WHERE (pealkiri LIKE '%auto%' OR kirjeldus LIKE '%auto%')";
	$query = $this->db->query($sql);
	return $query->result_array();
}

public function getNextSegment($segmentNumber, $offset, $category){
	if($offset == null){//esimesel lehel pole seda /0 asja aadessi l천pus, seega peame selleks ka valmis olema.
        	$offset = 0;
        }
        $limit = 10;
        $newOffset = $offset + $segmentNumber*10;
        $sql = "SELECT * from item WHERE category = '".$category."' limit $newOffset ,$limit";
        $result = $this->db->query($sql)->result_array();
        //$result = $this->db->get_where('item', array('category' => $category))->result_array();
        return $result;
}


public function getByOffset($offset, $category){
        if($offset == null){//esimesel lehel pole seda /0 asja aadessi l천pus, seega peame selleks ka valmis olema.
        	$offset = 0;
        }
        $limit = 30;
        $sql = "SELECT * from item WHERE category = '".$category."' limit $offset ,$limit";
        $result = $this->db->query($sql)->result_array();
        //$result = $this->db->get_where('item', array('category' => $category))->result_array();
        return $result;
    }
    
    
public function getTotalRows($category){
	$sql = "SELECT * FROM item WHERE category = '".$category."'";
	$result = $this->db->query($sql)->num_rows();
	return $result;
}

}

?>