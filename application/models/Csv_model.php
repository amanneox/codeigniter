<?php

class csv_model extends CI_Model {

    function __construct() {
        parent::__construct();
         $this->load->database();
    }

    function get_data() {
	  $u_id=$_SESSION['logged_in']['u_id'];
          $this->db->where('u_id',$u_id);
        $query = $this->db->get('leads');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    function insert_csv($data) {

      $query= $this->db->insert('leads', $data);
      if ($this->db->affected_rows() > 0)
    {
      return TRUE;
    }
    else
    {
     print_r( $this->db->error()); 
      return FALSE;
    }

    }
}
