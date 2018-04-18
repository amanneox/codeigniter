<?php
header('Access-Control-Allow-Origin: *');
 ini_set('max_execution_time', 300);
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  function __construct() {
parent::__construct();

$this->load->library('pagination');
$this->load->helper('form');
$this->load->library('form_validation');
$this->load->helper('url');
$this->load->helper('date');
}

public function create_mng()
{
$this->load->view('mng_emp');
}
public  function gen_mng()
{
  $this->form_validation->set_rules('memail','email', 'trim|required|valid_email|is_unique[manager.email]');
  $this->form_validation->set_rules('mepass','Password','trim|required|max_length[15]|min_length[6]|alpha_numeric');
  $this->form_validation->set_rules('mecpass','Password Confirmation','trim|required|matches[mepass]');
  if ($this->form_validation->run() == FALSE) {
  $this->load->view('mng_emp');
  } else {
$id=$this->input->post('u_id');
$name=$_POST['mname'];
$email=$_POST['memail'];
$num=$_POST['mnum'];
$pass=$_POST['mepass'];
$data=array(
  'name'=>$name,
  'email'=>$email,
  'pass'=>$pass,
  'number'=>$num,
  'u_id'=>$id
);
$this->load->model('show_model');

$result=$this->show_model->add_mng($data);
if ($result==True) {
  $data['msg']="Successfully Created";
  $this->load->view('mng_emp',$data);
}
else {
  $data['msg']="Failed";
  $this->load->view('mng_emp',$data);
}

}
}
public function gen_emp()
{
  $this->form_validation->set_rules('empmail','email', 'trim|required|valid_email|is_unique[employee.email]');
  $this->form_validation->set_rules('emppass','Password','trim|required|max_length[15]|min_length[6]|alpha_numeric');
  $this->form_validation->set_rules('empcpass','Password Confirmation','trim|required|matches[emppass]');
  if ($this->form_validation->run() == FALSE) {
  $this->load->view('mng_emp');
  } else {
  $id=$this->input->post('u_id');
  $name=$_POST['empname'];
  $email=$_POST['empmail'];
  $num=$_POST['empnum'];
  $pass=$_POST['emppass'];
  $data=array(
    'name'=>$name,
    'email'=>$email,
    'pass'=>$pass,
    'number'=>$num,
    'u_id'=>$id
  );
  $this->load->model('show_model');

  $result=$this->show_model->add_emp($data);
  if ($result==True) {
    $data['msg']="Successfully Created";
    $this->load->view('mng_emp',$data);
  }
  else {
    $data['msg']="Failed";
    $this->load->view('mng_emp',$data);
  }
}
}

public function create_temp()
{
$head=$this->input->post('head');
$foot=$this->input->post('foot');
$body=$this->input->post('body');
$type=$this->input->post('type');

$u_id=$_SESSION['logged_in']['u_id'];
$this->load->model('lead_model');
$data=array(
  't_head'=>$head,
  't_body'=>$body,
  't_end'=>$foot,
  't_type'=>$type,
  'u_id'=>$u_id,
);
$result=$this->lead_model->create_template($data);
if ($result==TRUE) {
  $result="Created successfully";
    $this->load->view('template',$result);
}
}
public function temp()
{
  $this->load->view('template');
}
public function timestamp()
{
  date_default_timezone_set('Asia/Kolkata');
  echo $timestamp = date('H:i:s');
}
public function failure()
{
$this->load->view('failure');
}
public function delete_appointment()
{
$id=$_POST['appid'];

$this->load->model('show_appoint');
$result=$this->show_appoint->delete($id);
if ($result==True) {
  echo "Your Appointment has been deleted.";
}
else {
  echo "Unable to Delete Appointment.";
}

}
public function create_app()
{
  $this->load->model('show_model');
  $data['results']=$this->show_model->get_leads();
  $this->load->view('create_appointment',$data);
}
public function create_appointment()
{
  $this->load->helper('form');
  $this->load->helper('url');
  $this->load->model('show_appoint');
  $date=$_POST['date'];
  $note=$_POST['desc'];
  $status=$_POST['status'];
  $id=$_POST['user_id'];

$date=date('Y-m-d', strtotime($date) );

    if ($this->show_appoint->check_exists($id)) {
    echo "Appointment Already Exist";
    }
    else{
    if($this->show_appoint->new_appointment($id,$status,$note,$date))
    {
        echo "success";
    }
    else
    {
        echo "fail";
    }

  }


}
public function changestatus()
{
  $id=$this->input->post('appid');
  $status=$this->input->post('status');
  $note=$this->input->post('note');
  $this->load->model('show_appoint');
  $apptime=$this->input->post('apptime');
  $this->show_appoint->update_appointment($id,$status,$note,$apptime);

}
public function changestatus1()
{
  $id=$this->input->post('scrm_id');
  $status=$this->input->post('leadstatus');
  $note=$this->input->post('note');
  $this->load->model('lead_model');
  $this->lead_model->update_lead($id,$status,$note);
  redirect('leads');
}
public function addnote()
{
  $id=$this->input->post('appid');
  $note=$this->input->post('note');
  $this->load->model('show_appoint');
  if($this->show_appoint->add_note($id,$note))
   {
       echo "success";
   }
   else
   {
       echo "fail";
   }
}
public function display($id) {
    $this->load->model("show_appoint");
    $d=$this->show_appoint->get_current_appointment($id);
    $data['result']=$d;
    $log=$this->show_appoint->get_email_log($id);
    $data['email_log']=$log;
    $log1=$this->show_appoint->get_call_log($id);
    $data['call_log']=$log1;


    $this->load->model("show_emp");
    $d=$this->show_emp->update_retrive($id);
    $data['details'] = $d;
    $this->load->view('company_info',$data);
}
    public function index()
    {
		if (!isset($_SESSION['logged_in'])) {
        redirect('login');

      }

      $params = array();
      $limit_per_page = 9;
      $this->load->model("show_appoint");
      $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
      $d=$this->show_appoint->get_total();

      $touch=$this->show_appoint->get_recent_touch();
      $params['touch']=$touch;

      $calls=$this->show_appoint->get_recent_calls();
      $params['calls']=$calls;
      if ($d > 0)
        {
            // get current page records
            $params["results"] = $this->show_appoint->get_current_page_records($limit_per_page, $page*$limit_per_page);

            $config['base_url'] = base_url() . 'home/index';
            $config['total_rows'] = $d;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

            // custom paging configuration
            $config['num_links'] = 4;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

            $config['full_tag_open'] = '<div class="pagination">';
            $config['full_tag_close'] = '</div>';

            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<span class="firstlink">';
            $config['first_tag_close'] = '</span>';

            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<span class="lastlink">';
            $config['last_tag_close'] = '</span>';

            $config['next_link'] = 'Next Page';
            $config['next_tag_open'] = '<span class="nextlink">';
            $config['next_tag_close'] = '</span>';

            $config['prev_link'] = 'Prev Page';
            $config['prev_tag_open'] = '<span class="prevlink">';
            $config['prev_tag_close'] = '</span>';

            $config['cur_tag_open'] = '<span class="curlink">';
            $config['cur_tag_close'] = '</span>';

            $config['num_tag_open'] = '<span class="numlink">';
            $config['num_tag_close'] = '</span>';

            $this->pagination->initialize($config);

            // build paging links
            $params["links"] = $this->pagination->create_links();
        }

   $this->load->view('home', $params);


    }

  public function view_reports() {
    $this->load->model("show_model");
    $data['emails']=$this->show_model->get_email_log();
    $data['calls']=$this->show_model->get_call_log();
    $this->load->view('reports',$data);


    }
  }
?>
