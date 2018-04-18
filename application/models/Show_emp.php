<?php
class show_emp extends CI_Model

{
  public function update_lead_data($id,$data) {

      $this->db->where('scrm_id', $id);
      $this->db->update('leads', $data);
$values=array(
  'scrm_id'=>$id,
); 
      $this->db->insert('log_call',$values);
      if ($this->db->affected_rows() > 0)
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }
public function get_numbers() {
  $u_id=$_SESSION['logged_in']['u_id'];
 $this->db->select('*');
 $this->db->from('leads');
 $this->db->where('u_id',$u_id);
 $query=$this->db->get();
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
public function get_emails()
{
  $u_id=$_SESSION['logged_in']['u_id'];
 $this->db->select('*');
 $this->db->from('leads');
 $this->db->where('u_id',$u_id);
$query=$this->db->get();
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
public function update_retrive($userId)
{

$this->load->database();
$this->db->where('scrm_id',$userId);
$this->db->from('leads');
$q = $this->db->get();
return $q->result();
}
}
 ?>
