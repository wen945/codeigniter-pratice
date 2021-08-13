<?php
class Members extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Member_model');
        }

        public function index()
        {
                $data['all_member'] = $this->Member_model->get_members();
                $data['title'] = 'All Members';

                $this->load->view('templates/header', $data);
                $this->load->view('members/index', $data);
                $this->load->view('templates/footer');
        }

        
        // public function view($system_id =-1)
        // {
        //         $data['member'] = $this->Member_model->get_members($system_id);

        //         // if (empty($data['member']))
        //         // {
        //         //         show_404();
        //         // }

        //         // $data['title'] = $data['member']['member_name'];

        //         $this->load->view('templates/header', $data);
        //         $this->load->view('memberinfo/index', $data);
        //         $this->load->view('templates/footer');
                
        // }

        public function create()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Create a new member';

                $this->form_validation->set_rules('member_name', 'Name', 'required');
                $this->form_validation->set_rules('text', 'text', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('class/create');
                        $this->load->view('templates/footer');
                }
                else
                {
                        $this->student_model->set_students();
                        $this->load->view('class/success');
                }
        }
}
?>