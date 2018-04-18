<?php
class Show_appoint extends CI_Model

{
  public function get_email($id)
  {
      $this->db->select('email');
      $this->db->from('leads');

      $this->db->where('scrm_id',$id);
    //  $this->db->where('leads.scrm_id',$id);
      $this->db->limit(1);

      $query = $this->db->get();
      if ( $query->num_rows() > 0 )
   {
       $row = $query->row_array();
       return $row;
   }

  }
  public function delete($id)
  {
    $this->db->where('AppID', $id);
  $this->db->delete('appointments');
  if ($this->db->affected_rows() > 0)
{
  return TRUE;
}
else
{
  return FALSE;
}
  }
  public function check_exists($id)
  {
    $this->db->where('scrm_id',$id);
      $query = $this->db->get('appointments');
      if ($query->num_rows() > 0){
          return true;
      }
      else{
          return false;
      }
  }
public function new_appointment($id,$status,$note='none',$datetime)
{
   $u_id=$_SESSION['logged_in']['u_id'];
    $data = array(
        'AppDate'=>$datetime,
        'AppDesc'=>$note,
        'scrm_id'=>$id,
        'status'=>$status,
        'u_id'=>$u_id,
    );
    $this->db->insert('appointments',$data);
    if ($this->db->affected_rows() > 0)
  {
    return TRUE;
  }
  else
  {
    return FALSE;
  }

}
public function get_recent_calls()
{
	  $u_id=$_SESSION['logged_in']['u_id'];
          $this->db->select('*');
          $this->db->from('log_call');
	  $this->db->where('log_call.u_id',$u_id);
          $this->db->join('leads','leads.scrm_id=log_call.scrm_id','inner');
          $this->db->order_by('log_date','desc');
          $this->db->limit(5);

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
  public function get_recent_touch()
  {
	    $u_id=$_SESSION['logged_in']['u_id'];
            $this->db->select('*');
            $this->db->from('log_email');
	    $this->db->where('log_email.u_id',$u_id);
            $this->db->join('leads','leads.scrm_id=log_email.scrm_id','inner');
            $this->db->order_by('send_date','desc');
            $this->db->limit(5);

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
public function record_email($data)
{

  $this->db->insert('log_email',$data);

  if ($this->db->affected_rows() > 0)
{
  return TRUE;
}
else
{

  return FALSE;
}

}

  public function add_note($id,$note)
  {
    $data = array(
                   'AppDesc' => $note
                );

    $this->db->where('AppID', $id);
    $this->db->update('appointments', $data);
  }
public function update_appointment($id,$status,$note,$apptime)
{

  $data = array(
                 'AppDesc' => $note,
                 'status' => $status,
                 'AppDate'=>$apptime,
              );

  $this->db->where('AppID', $id);
  $this->db->update('appointments', $data);
}
public function get_email_log($id)
{
 $u_id=$_SESSION['logged_in']['u_id'];
  $this->db->select('*');
  $this->db->from('appointments');
   $this->db->where('appointments.u_id',$u_id);
  $this->db->join('leads','leads.scrm_id=appointments.scrm_id','inner');
  $this->db->join('log_email','log_email.scrm_id=appointments.scrm_id','inner');
  $this->db->where('appointments.scrm_id',$id);
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
public function get_call_log($id)
{
 $u_id=$_SESSION['logged_in']['u_id'];
  $this->db->select('*');
  $this->db->from('appointments');
   $this->db->where('appointments.u_id',$u_id);
  $this->db->join('leads','leads.scrm_id=appointments.scrm_id','inner');
  $this->db->join('log_call','log_call.scrm_id=appointments.scrm_id','inner');
  $this->db->where('appointments.scrm_id',$id);
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
  public  function get_current_appointment($id)
  {
    $this->db->select('*');
    $this->db->from('appointments');
    $this->db->join('leads','leads.scrm_id=appointments.scrm_id','inner');
    $this->db->where('appointments.scrm_id',$id);
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

  public function get_current_page_records($limit, $start)
          {
         $this->db->limit($limit, $start);

         $this->db->select('*');
         $this->db->from('appointments');
         $this->db->join('leads','leads.scrm_id=appointments.scrm_id','inner');
         $query=$this->db->get();

           $u_id=$_SESSION['logged_in']['u_id'];
         $query1 =$this->db->query("SELECT * FROM appointments INNER JOIN leads ON leads.scrm_id = appointments.scrm_id WHERE Date(appointments.AppDate)=DATE_SUB(CURRENT_DATE(),INTERVAL 1 DAY) AND appointments.u_id=$u_id ORDER BY appointments.datecreated DESC LIMIT $start,$limit");
         $query2 = $this->db->query("SELECT * FROM appointments INNER JOIN leads ON leads.scrm_id = appointments.scrm_id WHERE Date(appointments.AppDate)=DATE_SUB(CURRENT_DATE(),INTERVAL 2 DAY) AND appointments.u_id=$u_id ORDER BY appointments.datecreated DESC LIMIT $start,$limit");
         $query3 = $this->db->query("SELECT * FROM appointments INNER JOIN leads ON leads.scrm_id = appointments.scrm_id WHERE Date(appointments.AppDate)<DATE_SUB(CURRENT_DATE(),INTERVAL 2 DAY) AND appointments.u_id=$u_id ORDER BY appointments.datecreated DESC LIMIT $start,$limit ");
         $query4 = $this->db->query("SELECT * FROM appointments INNER JOIN leads ON leads.scrm_id = appointments.scrm_id WHERE Date(appointments.AppDate)>DATE_SUB(CURRENT_DATE(),INTERVAL 1 DAY) AND appointments.u_id=$u_id ORDER BY appointments.datecreated DESC LIMIT $start,$limit");


          $result1 = $query1->result();
          $result2=$query2->result();
          $result3=$query3->result();
          $result4=$query4->result();

          $data['today']=$result1;
          $data['yesterday']=$result2;
          $data['previous']=$result3;
          $data['upcoming']=$result4;


          return $data;

     }
     public function get_total()
        {
	$u_id=$_SESSION['logged_in']['u_id'];
	$this->db->where('u_id',$u_id);
            return $this->db->count_all("appointments");
        }

}
