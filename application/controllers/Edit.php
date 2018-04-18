<?php

class Edit extends CI_Controller {
  function __construct() {
parent::__construct();

$this->load->helper('form');
$this->load->helper('url');
$this->load->helper('date');
}
public function company_info()
{
   $user_id= $this->input->get('user_id');
  $this->load->model("show_emp");
    $this->load->model("show_model");
  $d=$this->show_emp->update_retrive($user_id);
  $data['details'] = $d;

  $this->load->model("show_appoint");
  $d2=$this->show_appoint->get_current_appointment($user_id);
  $data['result']=$d2;

  $log=$this->show_appoint->get_email_log($user_id);
  $data['email_log']=$log;

  $val=$_SESSION['logged_in']['u_data'];
  $value= json_decode(json_encode($val), true);
  $id=$value[0]['id'];
  $manager=$this->show_model->get_mng_emp($id);
  $data['manager_emp']=$manager;

  $this->load->view('company_info',$data);
}

public function changestatus()
{
  $id=$this->input->post('scrm_id');
  $status=$this->input->post('leadstatus');
  $note=$this->input->post('note');
  $this->load->model('lead_model');
  $this->lead_model->update_lead($id,$status,$note);
   
}

public function show_leads() {

  $user_id= $this->input->get('user_id');
  $this->load->model("show_emp");
  $d=$this->show_emp->update_retrive($user_id);
  $data['details'] = $d;

  $this->load->model("show_appoint");
  $d=$this->show_appoint->get_current_appointment($user_id);
  $data['results']=$d;

  $log=$this->show_appoint->get_email_log($user_id);
  $data['email_log']=$log;

  $this->load->view('edit_emp',$data);
}
        public function index()
        {

                $this->load->view('edit');
        }
        public function update_lead()
        {
                         $this->load->helper('form');
                         $this->load->helper('url');

                         $this->load->library('form_validation');

          $this->form_validation->set_rules('leadowner', 'Lead Owner');
          $this->form_validation->set_rules('leadownerid', 'Saletancy ID', 'required');
          $this->form_validation->set_rules('company', 'Company');
          $this->form_validation->set_rules('salutation', 'Salutation');
          $this->form_validation->set_rules('firstname', 'First Name');
          $this->form_validation->set_rules('lastname', 'Last Name');
          $this->form_validation->set_rules('title', 'Title');
          $this->form_validation->set_rules('email', 'Email');
          $this->form_validation->set_rules('phone', 'Phone');
          $this->form_validation->set_rules('directphone', 'Direct Phone');
          $this->form_validation->set_rules('mobile', 'Mobile');
          $this->form_validation->set_rules('website', 'Website');
          $this->form_validation->set_rules('leadsource', 'Lead Source');
          $this->form_validation->set_rules('leadstatus', 'Lead Status');
          $this->form_validation->set_rules('industry', 'Industry');
          $this->form_validation->set_rules('subindustry', 'Sub Industry');
          $this->form_validation->set_rules('address', 'Address');
          $this->form_validation->set_rules('city', 'City');
          $this->form_validation->set_rules('state', 'State');
          $this->form_validation->set_rules('pincode', 'Pincode');
          $this->form_validation->set_rules('country', 'Country');
          $this->form_validation->set_rules('desc', 'Description');
          $this->form_validation->set_rules('skypeid', 'Skype ID');
          $this->form_validation->set_rules('revrange', 'Revenue range');
          $this->form_validation->set_rules('emprange', 'Employee range');
          $this->form_validation->set_rules('linkedinid', 'LinkedIn ID');
          $this->form_validation->set_rules('notes', 'Notes');

          if ($this->form_validation->run() == FALSE)
         {
         
              $this->index();

         }
         else
         {
                         $id= $this->input->post('scrm_id');
                         $leadowner= $this->input->post('leadowner');
                         $leadownerid= $this->input->post('leadownerid');
                         $company= $this->input->post('company');
                         $salutation= $this->input->post('salutation');
                         $firstname= $this->input->get('firstname');
                         $lastname= $this->input->post('lastname');
                         $title= $this->input->post('title');
                         $email= $this->input->post('email');
                         $phone= $this->input->post('phone');
                         $directphone= $this->input->post('directphone');
                         $mobile= $this->input->post('mobile');
                         $website= $this->input->post('website');
                         $leadsource= $this->input->post('leadsource');
                         $leadstatus= $this->input->post('leadstatus');
                         $industry= $this->input->post('industry');
                         $subindustry= $this->input->post('subindustry');
                         $address= $this->input->post('address');
                         $city= $this->input->post('city');
                         $state= $this->input->post('state');
                         $pincode= $this->input->post('pincode');
                         $country= $this->input->post('country');
                         $desc= $this->input->post('desc');
                         $skypeid= $this->input->post('skypeid');
                         $revrange= $this->input->post('revrange');
                         $emprange= $this->input->post('emprange');
                         $linkedinid= $this->input->post('linkedinid');
                         $notes= $this->input->post('notes');
                         $secondry= $this->input->post('secondry');

                         $data = array(

                  'leadowner' => $leadowner,
                  'leadownerid'=>$leadownerid,
                  'company' => $company,
                  'salutation' => $salutation,
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
                  'linkedinid' => $linkedinid,
                  'notes' => $notes,
                  'revrange' => $revrange,
                  'emprange' => $emprange,
                  'secondry'=>$secondry,
                );
          $this->load->model('show_emp');
          if($this->show_emp->update_lead_data($id,$data))
           {
              
              $this->load->model('show_appoint');
              if($leadstatus=='Appointement Set by SDR' || $leadstatus=='Lead completed by SDR' || $leadstatus=='Appointement reset by Lead' || $leadstatus=='Deal Closed')
                   {

                        $this->load->model('show_appoint');

        $d=$this->show_appoint->get_current_appointment($id);
        $data['result']=$d;
       
     
         $value= json_decode(json_encode($data['result']), true);
          echo $pro_id=$value[0]['AppID'];


                        if ($this->show_appoint->check_exists($id)) {
                        
                        if($this->show_appoint->update_appointment($pro_id,$leadstatus,$notes))
                        {
                          echo "updated";
                          redirect('leads');
                        }
                        else
                        {
                          echo "fail";
                        }

                        }
                        else{
                          $time_now=mktime(date('h')+5,date('i')+30,date('s'));
                      if($this->show_appoint->new_appointment($id,$leadstatus,$date=date('d-m-Y H:i', $time_now),$notes))
                        {
                            echo "success";
                            redirect('leads');

                           
                        }
                        else
                        {
                            echo "fail";
                        }

                   }
                 }
                 redirect('leads');
           }
           else
           {
            redirect('failure');
           }



          
         }

          

        }
        public function new_lead()
   {
	

     $this->load->library('form_validation');

          $this->form_validation->set_rules('leadowner', 'Lead Owner');
          $this->form_validation->set_rules('leadownerid', 'Saletancy ID', 'required|is_unique[leads.leadownerid]');
          $this->form_validation->set_rules('company', 'Company');
          $this->form_validation->set_rules('salutation', 'Salutation');
          $this->form_validation->set_rules('firstname', 'First Name');
          $this->form_validation->set_rules('lastname', 'Last Name');
          $this->form_validation->set_rules('title', 'Title');
          $this->form_validation->set_rules('email', 'Email','valid_email|is_unique[leads.email]');
          $this->form_validation->set_rules('phone', 'Phone');
          $this->form_validation->set_rules('directphone', 'Direct Phone');
          $this->form_validation->set_rules('mobile', 'Mobile');
          $this->form_validation->set_rules('website', 'Website');
          $this->form_validation->set_rules('leadsource', 'Lead Source');
          $this->form_validation->set_rules('leadstatus', 'Lead Status');
          $this->form_validation->set_rules('industry', 'Industry');
          $this->form_validation->set_rules('subindustry', 'Sub Industry');
          $this->form_validation->set_rules('address', 'Address');
          $this->form_validation->set_rules('city', 'City');
          $this->form_validation->set_rules('state', 'State');
          $this->form_validation->set_rules('pincode', 'Pincode');
          $this->form_validation->set_rules('country', 'Country');
          $this->form_validation->set_rules('desc', 'Description');
          $this->form_validation->set_rules('skypeid', 'Skype ID');
          $this->form_validation->set_rules('revrange', 'Revenue range');
          $this->form_validation->set_rules('emprange', 'Employee range');
          $this->form_validation->set_rules('linkedinid', 'LinkedIn ID');
          $this->form_validation->set_rules('notes', 'Notes');


         if ($this->form_validation->run() == FALSE)
         {
              $this->index();

         }
         else
         {
		 $u_id=$_SESSION['logged_in']['u_id'];
                 $this->load->model('lead_model');
                 $leadowner= $this->input->post('leadowner');
                 $leadownerid= $this->input->post('leadownerid');
                 $company= $this->input->post('company');
                 $salutation= $this->input->post('salutation');
                 $firstname= $this->input->post('firstname');
                 $lastname= $this->input->post('lastname');
                 $title= $this->input->post('title');
                 $email= $this->input->post('email');
                 $phone= $this->input->post('phone');
                 $directphone= $this->input->post('directphone');
                 $mobile= $this->input->post('mobile');
                 $website= $this->input->post('website');
                 $leadsource= $this->input->post('leadsource');
                 $leadstatus= $this->input->post('leadstatus');
                 $industry= $this->input->post('industry');
                 $subindustry= $this->input->post('subindustry');
                 $address= $this->input->post('address');
                 $city= $this->input->post('city');
                 $state= $this->input->post('state');
                 $pincode= $this->input->post('pincode');
                 $country= $this->input->post('country');
                 $desc= $this->input->post('desc');
                 $skypeid= $this->input->post('skypeid');
                 $revrange= $this->input->post('revrange');
                 $emprange= $this->input->post('emprange');
                 $linkedinid= $this->input->post('linkedinid');
                 $notes= $this->input->post('notes');
                 $secondry= $this->input->post('secondry');
                $result=$this->lead_model->lead_data($leadowner,$leadownerid,$company,$salutation,$firstname,$lastname,$title,$email,$phone,$directphone,$mobile,$website,$leadsource,$leadstatus,$industry,$subindustry,$address,$city,$state,$pincode,$country,$desc,$skypeid,$secondry,$revrange,$emprange,$linkedinid,$notes);

                if ($result) {
                redirect('leads');
                }
                else {
                  $data="Something went woring";
                  $this->index();
                }

           }

}
}
 ?>
