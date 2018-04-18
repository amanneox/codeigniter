<?php
 header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class cal extends CI_Controller {

		function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->load->model('Calendar_model');
        $this->load->helper(array('form', 'url'));


    }


	/*Home page Calendar view  */
	Public function index()
	{
                  $this->load->helper('form');
    $result['rem']=$this->Calendar_model->get_rem();
		$this->load->view('calendar',$result);
	}

	/*Get all Events */

	Public function getEvents()
	{
		$result=$this->Calendar_model->getEvents();
		echo json_encode($result);
	}
	/*Add new event */
	Public function addEvent()
	{
                $time=$_POST['time'];
		$result=$this->Calendar_model->addEvent();
		echo $result;
	}
	/*Update Event */
	Public function updateEvent()
	{
		$result=$this->Calendar_model->updateEvent();
		echo $result;
	}
	/*Delete Event*/
	Public function deleteEvent()
	{
		$result=$this->Calendar_model->deleteEvent();
		echo $result;
	}
	Public function dragUpdateEvent()
	{

		$result=$this->Calendar_model->dragUpdateEvent();
		echo $result;
	}
public function create_rem()
{
  $this->load->helper('form');
  $u_id=$_SESSION['logged_in']['u_id'];
  $data=array(
    'rem_date'=>$this->input->post('remdate'),
    'rem_title'=>$this->input->post('remtitle'),
    'rem_desc'=>$this->input->post('remdesc'),
    'u_id'=>$u_id,
  );
$result=$this->Calendar_model->create_rem($data);
if ($result==True) {
  $msg=array(
    'msg_display'=>"Successfully Created Reminder"
  );
	redirect('cal');
}
else {
  $msg=array(
    'msg_display'=>"Something Went Wrong"
  );

redirect('cal');
}
}


}
