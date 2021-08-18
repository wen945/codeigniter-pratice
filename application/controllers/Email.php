<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
    }
    
    function send(){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->IsSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'wen94945@gmail.com';
        $mail->Password = 'TesT1234';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        $mail->CharSet = "utf-8";
        
        $mail->From ='wen94945@gmail.com'; //寄件者信箱
        $mail->FromName = 'wen94945@gmail.com'; //寄件者姓名);
        
        // Add a recipient
        $mail->IsHTML(true); //郵件內容為html
        $mail->AddAddress("wenjp65@gmail.com"); //收件者郵件及名稱
        // // Add cc or bcc 
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>You have successfully registered your membership in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
    }
    
}