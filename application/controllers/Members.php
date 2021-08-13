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

        
        public function view($number)
        {
                $data['member'] = $this->Member_model->get_members($number);

                if (empty($data['member']))
                {
                        show_404();
                }

                $data['title'] = $data['member']['member_name'];

                $this->load->view('templates/header', $data);
                $this->load->view('members/view', $data);
                $this->load->view('templates/footer');
                
        }
        

        public function create()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = '新增會員資料';

                $this->form_validation->set_rules('member_name', 'Name', 'required');
                $this->form_validation->set_rules('member_acct', 'acct', 'required');
                $this->form_validation->set_rules('member_pawd', 'pawd', 'required');
                

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('members/create');
                        $this->load->view('templates/footer');
                }
                else
                {
                        $this->Member_model->set_members();
                        $this->load->view('members/success');
                }
        }
        public function remove()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = '刪除會員資料';

                $this->form_validation->set_rules('member_name', 'Name', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('members/remove',$data);
                        $this->load->view('templates/footer');
                }
                else
                {
                        $data['title'] = 'remove success!';
                        $this->Member_model->remove_members();
                        $this->load->view('members/success',$data);
                }
        }
}
?>