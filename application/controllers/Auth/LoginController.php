<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class LoginController extends CI_Controller
{
    public function __construct()
    {   
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('UserModel');
    }
    public function index()
    {
        $this->load->view('templates/header.php');
        $this->load->view('Auth/login.php');
        $this->load->view('templates/footer.php');
    }

    public function login()
    {
        $this->form_validation->set_rules('email','Email','trim|valid_email|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        
        
        if ($this->form_validation->run() == FALSE)
        {
            //failed
            // $array =array(
            //     'error'                     => true,
            //     'email_error'               =>form_error('email'),
            //     'password_error'            =>form_error('password'),
            // );
            $this->index();
        }
        else
        {
        
            $data = [
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            ];
            $member = new UserModel;
            $result = $member->loginMember($data);
            if($result != FALSE)
            {
                $auth_memberdetails = [
                    'member_acct' =>$result->member_acct,
                    'member_pawd' =>$result->member_pawd,
                    'member_name' =>$result->member_name,
                    'member_phone'=>$result->member_phone,
                ];

                $this->session->set_userdata('authenticated','1');
                $this->session->set_userdata('auth_member',$auth_memberdetails);
                $this->session->set_flashdata('status','You are Logged in successfully');
                redirect(base_url('memberpage'));
            }
            else
            {
                $this->session->set_flashdata('status','Invalid Email Id Or Password');
                redirect(base_url('login'));
            }
            
        }
        // echo json_encode($array);
    }
}


?>