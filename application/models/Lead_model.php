<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lead_model extends CI_Model {

public function create_template($data)
{
  $this->db->insert('templates',$data);
  if ($this->db->affected_rows() > 0)
{
  return TRUE;
}
else
{
  return FALSE;
}
}

public function update_lead($id,$status,$note)
{

  $data = array(
                 'notes' => $note,
                 'leadstatus' => $status
              );

  $this->db->where('scrm_id', $id);
  $this->db->update('leads', $data);
$u_id=$_SESSION['logged_in']['u_id'];
  $values=array(
    'scrm_id'=>$id,
    'u_id'=>$u_id,
  );
        $this->db->insert('log_call',$values);
}

  public function lead_data($leadowner,$leadownerid,$company,$salutation,$firstname,$lastname,$title,$email,$phone,$directphone,$mobile,$website,$leadsource,$leadstatus,$industry,$subindustry,$address,$city,$state,$pincode,$country,$desc,$skypeid,$secondry,$revrange,$emprange,$linkedinid,$notes)
  {
$u_id=$_SESSION['logged_in']['u_id'];
    $data  = array(
       'leadowner' => $leadowner,
       'leadowner' => $leadownerid,
       'company' => $company,
       'firstname' => $firstname,
       'lastname' => $lastname,
       'title' => $title,
       'email' => $email,
       'phone' => $phone,
       'directphone' => $directphone,
       'mobile' => $mobile,
       'website' => $website,
       'leadsource' => $leadsource,
       'leadstatus' => $leadstatus,
       'industry' => $industry,
       'subindustry' => $subindustry,
       'address' => $address,
       'city' => $city,
       'state' => $state,
       'pincode' => $pincode,
       'country' => $country,
       'desc' => $desc,
       'skypeid' => $skypeid,
       'salutation' => $salutation,
       'revrange' => $revrange,
       'emprange' => $emprange,
       'linkedinid' => $linkedinid,
       'notes' => $notes,
	'u_id'=>$u_id,
        );

             $this->db->insert('leads', $data);

             if ($this->db->affected_rows() > 0)
           {
             return TRUE;
           }
           else
           {
             return FALSE;
           }
  }

}
