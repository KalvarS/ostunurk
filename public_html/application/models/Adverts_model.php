<?php
class Adverts_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }



public function get_adverts($slug = FALSE)
{
        if ($slug === FALSE)
        {
                $query = $this->db->get('adverts');
                return $query->result_array();
        }

        $query = $this->db->get_where('adverts', array('slug' => $slug));
        return $query->row_array();
}
}