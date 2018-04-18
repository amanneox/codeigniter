<?php
 header('Access-Control-Allow-Origin: *');
 ini_set('max_execution_time', 300);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require APPPATH.'includes/Exception.php';
require APPPATH.'includes/PHPMailer.php';
require APPPATH.'includes/SMTP.php';


class Mail extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('form');
    }
public function Bulk_mail()
{

  $message=$_POST['msg'];
  $subject=$_POST['sub'];

  $mail = new PHPMailer(true);
  $data = json_decode(stripslashes($_POST['emails']));

  $mail->SMTPDebug = 0;
  $mail->isSMTP();
  $mail->Host = 'smtp.sendgrid.net';
  $mail->SMTPAuth = true;
  $mail->Username = 'apikey';
  $mail->Password = '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';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  foreach($data as $to){
    try {

        $mail->setFrom('mansi0705babbar@gmail.com', 'Saletancy');
        $mail->addAddress($to);
        $mail->addReplyTo('mansi0705babbar@gmail.com', 'Saletancy');
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = $message;

        $mail->send();
        $mail->clearAddresses();
        echo 'Email Sent '.$to;
        echo "<br>";
    }
   catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        echo "<br>";
    }
  }


  }


public function mail_view()
{
  $this->load->model("show_emp");
  $d=$this->show_emp->get_emails();
  if ($d!=FALSE) {

    $data['bulk_mail']=$d;
    $this->load->model('show_model');
    $rs=$this->show_model->get_templates('email');
    $data['template']=$rs;
    $this->load->view('bulk_mail',$data);
  }
     $this->load->view('bulk_mail');
}

    public function Send_Mail() {

      $to=$this->input->post('email');
      $subject=$this->input->post('subject');
      $name=$this->input->post('name');
      $message=$this->input->post('message');
      $mail = new PHPMailer(true);
      $name="Aman";                             // Passing `true` enables exceptions
      try {
          //Server settings
          $mail->SMTPDebug = 0;                                 // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'apikey';                 // SMTP username
          $mail->Password = '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';                           // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                    // TCP port to connect to

          //Recipients
          $mail->setFrom('help@saletancy.com', 'Saletancy');
          $mail->addAddress($to, $name);     // Add a recipient

          $mail->addReplyTo('help@saletancy.com', 'Saletancy');
        //  $mail->addCC('cc@example.com');
        //  $mail->addBCC('bcc@example.com');

          //Attachments
      //    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

          //Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = $subject;
          $mail->Body    = $message;
          $mail->AltBody = $message;

          $mail->send();
          echo 'Message has been sent';
      } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }


  if (isset($_POST['scrm_id'])){
  $id=$_POST['scrm_id'];

  $this->load->model('show_appoint');

  $u_id=$_SESSION['logged_in']['u_id'];

  $data = array(
      'send_to'=>$to,
      'email_text'=>$message,
      'scrm_id'=>$id,
       'u_id'=>$u_id,

  );
  $this->show_appoint->record_email($data);
}


}

public function Send_Sech() {

  $id=$this->input->post('user_id');
  $this->load->model('show_appoint');

  $result=$this->show_appoint->get_email($id);
  $to=$result['email'];
  var_dump($id);
  var_dump($result);

  $subject="Appointment Reminder";

  $time=$this->input->post('date');
  $unix=strtotime($time)-3600;

  $message=$this->input->post('message');

  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
      //Server settings
      $mail->SMTPDebug = 0;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'apikey';                 // SMTP username
      $mail->Password = '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';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('help@saletancy.com', 'Saletancy');
      $mail->addAddress($to);     // Add a recipient
      $mail->addCustomHeader('send_at', $unix);

      $mail->addReplyTo('help@saletancy.com', 'Saletancy');

      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body    = $message;
      $mail->AltBody = $message;
     


      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }


}
}
?>
