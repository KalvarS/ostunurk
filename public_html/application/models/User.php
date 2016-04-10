<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $pw = MD5($password);
   $sql = "SELECT * FROM view_login_info WHERE username = '$username' AND password = '$pw' LIMIT 1";
   $query = $this->db->query($sql);
   
   
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>