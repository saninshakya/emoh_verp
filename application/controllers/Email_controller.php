<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Email_controller extends CI_Controller { 

  function __construct() { 
    parent::__construct(); 
    $this->load->library('session'); 
    $this->load->helper('form');
    $this->load->library('My_PHPMailer');
    $this->load->model('postemail');
  } 

  public function index() { 

    $this->load->helper('form'); 
    $this->load->view('email_form'); 
  } 

  public function send_mail() { 
    $from_email = "your@example.com"; 
    $toemail = $this->input->post('email'); 
    $subj = "Testing the email class";
    $msg = "testing is fun";
    $this->postemail->sendemail($msg,$toemail,$subj);

  }

/*//Load email library 
    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'Your SMTP Server',
      'smtp_port' => 25,
      'smtp_user' => 'Your SMTP User',
      'smtp_pass' => 'Your SMTP Pass',
      'mailtype'  => 'html',
      'charset'   => 'iso-8859-1',
      'starttls'  => true,
      );
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from($from_email, 'Your Name'); 
    $this->email->to($to_email);

    $this->email->subject('Email Test'); 
    $this->email->message('Testing the email class.'); 

//Send mail 
    if($this->email->send()) 
      $this->session->set_flashdata("email_sent","Email sent successfully."); 
    else 
      $this->session->set_flashdata("email_sent","Error in sending Email."); 
      $this->load->view('email_form');*/

    } 
    ?>