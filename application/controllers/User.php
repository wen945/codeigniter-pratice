<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller {
 
	function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper('form', 'url');
        $this->load->library('form_validation');
        $this->load->library('session');
 
        //get all users
        $this->data['users'] = $this->users_model->getAllUsers();
	}
 
	public function index(){
		$this->load->view('register', $this->data);
	}
 
	public function register()
    {
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|matches[password]');
 
        if ($this->form_validation->run() == FALSE) 
        { 
            //failed
         	$this->load->view('register', $this->data);
		}
		else
		{		
			$this->send();
			$email = $this->input->post('email');
			$password = $this->input->post('password');
 
			//generate simple random code
			// $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			// $code = substr(str_shuffle($set), 0, 12);
 
			//insert user to users table and get id
			$user['email'] = $email;
			$user['password'] = $password;
			$user['active'] = false;
			$id = $this->users_model->insert($user);
			redirect('user/register');
        }
	}
	public function send(){

		//設定輸入者信箱
		$email = $this->input->post('email');

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
        $mail->AddAddress($email); //收件者郵件及名稱
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
 
	public function activate(){
		$id =  $this->uri->segment(3);
		$code = $this->uri->segment(4);
 
		//fetch user details
		$user = $this->users_model->getUser($id);
 
		//if code matches
		if($user['code'] == $code){
			//update user active status
			$data['active'] = true;
			$query = $this->users_model->activate($data, $id);
 
			if($query){
				$this->session->set_flashdata('message', 'User activated successfully');
			}
			else{
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		}
		else{
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}
 
		redirect('register');


       
 
	}

    
}

?>