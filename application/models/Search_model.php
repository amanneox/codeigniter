<?php 
class Search_model extends CI_Model {

    public function get_results($search_term='default')
    {
        
  $this->db->like('scrm_id',$search_term);
  $this->db->or_like('firstname',$search_term);
  $this->db->or_like('lastname',$search_term);
  $this->db->or_like('company',$search_term);
  $this->db->or_like('email',$search_term);
  $this->db->or_like('leadstatus',$search_term);
  $query = $this->db->get('leads');
  return $query->result();


    }

}