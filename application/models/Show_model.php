<?php
class show_model extends CI_Model

{
public function get_mng_emp($user_id)
{
  $this->db->select('*');
  $this->db->from('manager');
//  $this->db->join('employee','employee.u_id=manager.u_id','inner');
  $this->db->where('manager.u_id',$user_id);
  $q=$this->db->get();

  $result1=$q->result();

  $this->db->select('*');
  $this->db->from('employee');
  $this->db->where('employee.u_id',$user_id);
  $q1=$this->db->get();

  $result2=$q1->result();

    $data['manager']=$result1;
    $data['employee']=$result2;

  return  array_merge($data['manager'],$data['employee']);

}

public function add_mng($data)
{
  $this->db->insert('manager', $data);

  if ($this->db->affected_rows() > 0)
{
  return TRUE;
}
else
{
  return FALSE;
}

}

public function add_emp($data)
{
  $this->db->insert('employee', $data);

  if ($this->db->affected_rows() > 0)
{
  return TRUE;
}
else
{
  return FALSE;
}

}

  public function get_current_page_records($limit, $start)
   {
         $u_id=$_SESSION['logged_in']['u_id'];

       $this->db->limit($limit, $start);
       $this->db->where('u_id',$u_id);
       $query = $this->db->get("leads");

       if ($query->num_rows() > 0)
       {
           foreach ($query->result() as $row)
           {
               $data[] = $row;
           }

           return $data;
       }

       return false;
   }

  public function get_total()
   {
       return $this->db->count_all("leads");
   }
public function get_templates($type)
{
  $this->load->database();

$u_id=$_SESSION['logged_in']['u_id'];

  $this->db->select('*');
  $this->db->from('templates');
  $this->db->where('t_type',$type);
  $this->db->where('u_id',$u_id);
     $q = $this->db->get();

     /* after we've made the queries from the database, we will store them inside a variable called $data, and return the variable to the controller */
     if($q->num_rows() > 0)
     {
       foreach ($q->result() as $row)
       {
         $data[] = $row;
       }
       return $data;
     }
     return false;
}

  function get_leads()
  {

$u_id=$_SESSION['logged_in']['u_id'];
 $this->db->where('u_id',$u_id);
    $q = $this->db->get('leads');

    /* after we've made the queries from the database, we will store them inside a variable called $data, and return the variable to the controller */
    if($q->num_rows() > 0)
    {
      foreach ($q->result() as $row)
      {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

public function get_email_log()
{
 $this->db->select('*');

 $this->db->order_by('send_date', "desc");
 $this->db->from('log_email');
 $this->db->join('leads','leads.scrm_id=log_email.scrm_id','inner');
 $query=$this->db->get();
if ( $query->num_rows() > 0 )
   {
       $row = $query->result_array();
       return $row;
   }
   else {
     return false;
   }
}

public function get_call_log()
{
 $this->db->select('*');

 $this->db->order_by('log_date', "desc");
 $this->db->from('log_call');
 $this->db->join('leads','leads.scrm_id=log_call.scrm_id','inner');
 $query=$this->db->get();
if ( $query->num_rows() > 0 )
   {
       $row = $query->result_array();
       return $row;

   }
   else {
     return false;
   }
}

}
