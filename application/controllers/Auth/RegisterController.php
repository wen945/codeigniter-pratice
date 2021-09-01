<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class RegisterController extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');


        $this->load->model('UserModel');

    }

    public  function index()
    {
        $this->load->view('templates/header.php');
        $this->load->view('Auth/register.php');
        $this->load->view('templates/footer.php');
    } 

    public function register()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|required|regex_match[/^[0-9]{10}$/]');

        if($this->form_validation->run() == FALSE)
        {
            //failed return errormessage
            //json
            $array =array(
                'error'                     => true,
                'email_error'               =>form_error('email'),
                'password_error'            =>form_error('password'),
                'password_confirm_error'    =>form_error('password_confirm'),
                'name_error'                =>form_error('name'),
                'phone_error'               =>form_error('phone'),
            );
            //form_error
            // $this->index();
        }
        else
        {   
            $array = array(
                'success' => '<div class="alert alert-success">Register successfully </div>'
            );

            $data = array
            (
                'member_acct' =>$this->input->post('email'),
                'member_pawd' =>$this->input->post('password'),
                'member_name' =>$this->input->post('name'),
                'member_phone'=>$this->input->post('phone'),
                'system_state'=>'1'
                
            );
            $register_member = new UserModel;
            $checking = $register_member -> registerMember($data);
            if($checking)
            {   
                $this->send();
            }
            else
            {
                $this->session->set_flashdata('status','Something went wrong !!!');
                redirect(base_url('register'));
            }
        
        }
        echo json_encode($array);
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
            $this->session->set_flashdata('status','Message could not be sent.');
            $this->session->set_flashdata('status','Mailer Error:'. $mail->ErrorInfoMessage);
            redirect(base_url('register'));
        }else{
            $this->session->set_flashdata('status','Register Successfully!! Message has been sent');
            redirect(base_url('login'));
            
        }
    }
}





?>