<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {
public function get_rem()
{
	$u_id=$_SESSION['logged_in']['u_id'];
	$this->db->select('*');
	$this->db->from('reminders');
	$this->db->where('u_id',$u_id);
	$query = $this->db->get();
	$result=$query->result();

	return $result;
}

public function create_rem($data)
{
  $this->db->insert('reminders',$data);
	if ($this->db->affected_rows() > 0)
{
	return TRUE;
}
else
{
	return FALSE;
}
}

/*Read the data from DB */
	Public function getEvents()
	{
		$u_id=$_SESSION['logged_in']['u_id'];
	$sql = "SELECT * FROM events WHERE events.start BETWEEN ? AND ? AND u_id=$u_id ORDER BY events.start ASC";

         	return $this->db->query($sql, array($_GET['start'], $_GET['end']))->result();

	}

/*Create new events */
Public function addEvent()
	{

  $u_id=$_SESSION['logged_in']['u_id'];
	$data=array(
		'title'=>$_POST['title'],
		'start'=>$_POST['start'],
		'end'=>$_POST['end'],
		'description'=>$_POST['description'],
		'color'=>$_POST['color'],
		'u_id'=>$u_id,
             'current_time'=>$_POST['time']
	);
	$this->db->insert('events',$data);
	 if ($this->db->affected_rows()>0){ return true;	}
		 else{	return false;	}
	}

	/*Update  event */

	Public function updateEvent()
	{

	    $data  = array(
          'title' => $_POST['title'],
          'description' => $_POST['description'],
          'color'=>$_POST['color'],
           'current_time'=>$_POST['time'],
);
$this->db->where('id', $_POST['id']);
$this->db->update('events', $data);
if ($this->db->affected_rows()>0){ return true;	}
  else{	return false;	}
	}


	/*Delete event */

	Public function deleteEvent()
	{

	$sql = "DELETE FROM events WHERE id = ?";
	$this->db->query($sql, array($_GET['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */

	Public function dragUpdateEvent()
	{
			//$date=date('Y-m-d h:i:s',strtotime($_POST['date']));

			$sql = "UPDATE events SET  events.start = ? ,events.end = ?  WHERE id = ?";
			$this->db->query($sql, array($_POST['start'],$_POST['end'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;


	}






}