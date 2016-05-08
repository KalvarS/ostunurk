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

public function get_last()
{
	$sql = "SELECT * FROM view_item_search_info ORDER BY ID DESC LIMIT 5";
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
$sql = "CALL new_item_advert(NULL,'$advert[title]', '$advert[price]','$advert[description]','$advert[type]','$advert[category]','$advert[pic1]','$advert[pic2]','$advert[pic3]','$advert[pic4]','$advert[seller]')";
$query = $this->db->query($sql);

if($query === TRUE){
	return TRUE;
}else{
	$last_query = $this->db->last_query();
	return $last_query;
}
}

function delete_advert($ID){
        $sql = "DELETE FROM item WHERE ID='".$ID."'";
        $this->db->query($sql);
}

public function edit_advert($advert){
        $sql = "UPDATE item SET title='".$advert['title']."', category='".$advert['category']."', price='".$advert['price']."', description='".$advert['description']."', type='".$advert['type']."', pic1='".$advert['pic1']."',pic2='".$advert['pic2']."', pic3='".$advert['pic3']."', pic4='".$advert['pic4']."' WHERE ID='".$advert['ID']."'";
        $this->db->query($sql);
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


public function getNextSegment($segmentNumber, $offset, $category, $username, $sorting){
	if($offset == null){//esimesel lehel pole seda /0 asja aadessi l천pus, seega peame selleks ka valmis olema.
        	$offset = 0;
        }
        if($sorting == 'titleza'){
        	$add = 'ORDER BY title DESC';
        }else if($sorting == 'priceasc'){
                $add = 'ORDER BY price ASC';
        }else if($sorting == 'pricedesc'){
                $add = 'ORDER BY price DESC';
        }else{
                $add = 'ORDER BY title ASC';
        }
        if($category == 'watchlist'){
	        $limit = 10;
	        $newOffset = $offset + $segmentNumber*10;
	        $sql = "SELECT * from view_user_tracked_items, view_item_search_info WHERE view_user_tracked_items.username = '".$username."' AND view_user_tracked_items.advert_ID = view_item_search_info.ID ".$add." LIMIT $newOffset ,$limit ";
	        $result = $this->db->query($sql)->result_array();
	        return $result;
        }else if($category == 'myitems'){
        	$limit = 10;
	        $newOffset = $offset + $segmentNumber*10;
	        $sql = "SELECT * from item WHERE seller = '".$username."'  ".$add."  LIMIT $newOffset ,$limit ";
	        $result = $this->db->query($sql)->result_array();
	        return $result;
        }else{
	        $limit = 10;
	        $newOffset = $offset + $segmentNumber*10;
	        $sql = "SELECT * from item WHERE category = '".$category."'  ".$add."  LIMIT $newOffset ,$limit ";
	        $result = $this->db->query($sql)->result_array();
	        //$result = $this->db->get_where('item', array('category' => $category))->result_array();
	        return $result;
        }
}


public function getByOffset($offset, $category, $username, $sorting){ //username on watchlisti jaoks
        if($offset == null){//esimesel lehel pole seda /0 asja aadessi l천pus, seega peame selleks ka valmis olema.
        	$offset = 0;
        }
        if($sorting == 'titleza'){
        	$add = 'ORDER BY title DESC';
        }else if($sorting == 'priceasc'){
                $add = 'ORDER BY price ASC';
        }else if($sorting == 'pricedesc'){
                $add = 'ORDER BY price DESC';
        }else{
                $add = 'ORDER BY title ASC';
        }
        if($category == 'watchlist'){
        	$limit = 30;
        	$sql = "SELECT * from view_user_tracked_items, view_item_search_info WHERE view_user_tracked_items.username = '".$username."' AND view_user_tracked_items.advert_ID = view_item_search_info.ID  ".$add."  LIMIT $offset ,$limit ";
        	$result = $this->db->query($sql)->result_array();
        	return $result;
        }else if($category == 'myitems'){
        	$limit = 30;
        	$sql = "SELECT * FROM item WHERE seller = '".$username."'  ".$add."  LIMIT $offset ,$limit ";
        	$result = $this->db->query($sql)->result_array();
        	return $result;
        }else{
	        $limit = 30;
	        $sql = "SELECT * from item WHERE category = '".$category."'  ".$add."  LIMIT $offset ,$limit ";
	        $result = $this->db->query($sql)->result_array();
	        return $result;
        }
    }
    
    
public function getTotalRows($category, $username){
	if($category == 'watchlist'){
		$sql = "SELECT * from view_user_tracked_items, view_item_search_info WHERE view_user_tracked_items.username = '".$username."' AND view_user_tracked_items.advert_ID = view_item_search_info.ID";
        	$result = $this->db->query($sql)->num_rows();
        	return $result;
	}else if($category == 'myitems'){
		$sql = "SELECT * FROM item WHERE seller = '".$username."'";
        	$result = $this->db->query($sql)->num_rows();
        	return $result;
	}else{
		$sql = "SELECT * FROM item WHERE category = '".$category."'";
		$result = $this->db->query($sql)->num_rows();
		return $result;
	}
}

public function addToWatchlist($username, $itemID){
	$sql = "INSERT INTO track_item (username, advert_ID) VALUES ('".$username."', '".$itemID."')";
	$result = $this->db->query($sql);
}

public function removeFromWatchlist($username, $itemID){
	$sql = "DELETE FROM track_item WHERE username = '".$username."' AND advert_ID = '".$itemID."'";
	$this->db->query($sql);
}

public function isInWatchlist($username, $itemID){
	$sql = "SELECT * FROM view_user_tracked_items WHERE username = '".$username."' AND advert_ID = '".$itemID."'";
	$result = $this->db->query($sql)->num_rows();
	return $result;
}

}

?>