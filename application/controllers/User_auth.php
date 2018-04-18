<?php
header('Access-Control-Allow-Origin: *');
Class User_auth extends CI_Controller {

public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
$this->load->model('login_database');
}

// Show login page
public function index() {
$this->load->view('login_form');
}

// Show registration page
public function user_registration_show() {
$this->load->view('registration_form');
}

// Validate and store registration data in database
public function new_user_registration() {
  $this->load->helper('form');

  // Load form validation library
  $this->load->library('form_validation');
// Check validation for user input in SignUp form
$this->form_validation->set_rules('username', 'username', 'trim|required');
$this->form_validation->set_rules('email','email', 'trim|required|valid_email|is_unique[users.user_email]');
$this->form_validation->set_rules('password','Password','trim|required|max_length[15]|min_length[6]|alpha_numeric');
$this->form_validation->set_rules('confirm-password','Password Confirmation','trim|required|matches[password]');
$this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
$this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
$this->form_validation->set_rules('mobile','mobile', 'trim|required');
$this->form_validation->set_rules('country','country', 'trim|required');
$this->form_validation->set_rules('city','city', 'trim|required');
$this->form_validation->set_rules('state','state', 'trim|required');
$this->form_validation->set_rules('zip','zip', 'trim|required');
$this->form_validation->set_rules('address','address', 'trim|required');
if ($this->form_validation->run() == FALSE) {
$this->load->view('registration_form');
} else {
$data = array(
'user_name' => $this->input->post('username'),
'user_email' => $this->input->post('email'),
'user_password' => $this->input->post('password'),
'firstname'=>$this->input->post('firstname'),
'lastname'=>$this->input->post('lastname'),
'mobile'=>$this->input->post('mobile'),
'address'=>$this->input->post('address'),
'pincode'=>$this->input->post('zip'),
'state'=>$this->input->post('state'),
'country'=>$this->input->post('country'),
'city'=>$this->input->post('city'),
);
$result = $this->login_database->registration_insert($data);
if ($result == TRUE) {
$data['message_display'] = 'Registration Successfully !';
redirect('login','refresh');
} else {
$data['message_display'] = 'Username already exist!';
$this->load->view('registration_form', $data);
}
}
}

public function user_login_process() {
  $this->load->helper('form');


  $this->load->library('form_validation');

$this->form_validation->set_rules('username', 'username', 'trim|required');
$this->form_validation->set_rules('email','email', 'trim|required');
$this->form_validation->set_rules('password', 'password', 'trim|required');

if ($this->form_validation->run() == FALSE) {
$this->load->view('login_form');
} else {

  $this->load->library('session');
  $this->load->model('login_database');
if(isset($this->session->userdata['logged_in'])){
 $this->load->view('home');
  $status=json_encode(array('status' => 'ok'));
  //echo $status;
}
else {
$data = array(
'username' => $_POST['username'],
'email' => $_POST['email'],
'password' => $_POST['password']
);
$result = $this->login_database->login($data);
if ($result == TRUE) {

$username = $_POST['username'];
$email=$_POST['email'];
$id=$this->login_database->read_user_information($username);
$value= json_decode(json_encode($id), true);
$status=$value[0]['status'];
$u_id=$value[0]['id'];
if ($status=='block' OR $status=='pending') {
  $data['message_display'] = 'Your Registration is either pending or blocked';

  //redirect('login');
  $this->load->view('login_form', $data);
}
else {
$session_data = array(
'username' => $username,
'email'=>$email,
'u_data'=>$id,
'u_id'=>$u_id,
);

$this->session->set_userdata('logged_in', $session_data);
redirect('home', 'refresh');
$status=json_encode(array('status' => 'ok'));
//echo $status;
}
}
else {
$fail=json_encode(array('fail' => 'failed'));
//echo $fail;
$data = array(
'error_message' => 'Invalid Username or Password'
);
$this->load->view('login_form', $data);
}
}
}

}

public function profile()
{
$username = ($this->session->userdata['logged_in']['username']);
$result = $this->login_database->read_user_information($username);
if ($result != false) {
$data['userdata']=$result;
$this->load->view('profile',$data);
}
}
public function update()
{
$this->load->model('login_database');
$username=$_POST['user_name'];

$data = array(
'user_name' => $_POST['user_name'],
'user_password' => $_POST['password'],
'user_email' => $_POST['email'],
'firstname' => $_POST['firstname'],
'lastname' => $_POST['lastname'],
'mobile'=>$_POST['mobile'],
'address'=>$_POST['address'],
'pincode'=>$_POST['zip'],
'state'=>$_POST['state'],
'country'=>$_POST['country'],
'city'=>$_POST['city'],
);
  $result=$this->login_database->update_user($username,$data);
if ($result) {
echo "Successfull";
}
}

public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
$this->load->view('login_form', $data);
}

}

?>
