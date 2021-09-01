<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Form_validation extends CI_Controller{
    
    function index()
    {
        $this->load->view('templates/header.php');
        $this->load->view('form_validation');
        $this->load->view('templates/footer.php');
    }

    function validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('subject','Subject','required');
        $this->form_validation->set_rules('message','Message','required');
        if($this->form_validation->run())
        {
            $array = array(
                'success' => '<div class="alert alert-success">Thank you for Contact Us</div>'
            );
        }
        else
        {
            $array =array(
                'error'              => true,
                'name_error'         =>form_error('name'),
                'email_error'        =>form_error('email'),
                'subject_error'      =>form_error('subject'),
                'message_error'      =>form_error('message'),
            );
        }
        echo json_encode($array);
        
        
    }


}
?>