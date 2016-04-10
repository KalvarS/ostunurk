<?php
class Register_model extends CI_Model {

        public function __construct(){
                $this->load->database();
        }

	public function create_new_user($info){
		$sql = "CALL new_user_procedure('$info[personal_ID]', '$info[username]',MD5('$info[password]'),'$info[phone]','$info[email]','$info[firstname]','$info[lastname]')";
		$query = $this->db->query($sql);
		if($query === TRUE){
			return TRUE;
		}else{
			$last_query = $this->db->last_query();
		return $last_query;
		}
	}

}

