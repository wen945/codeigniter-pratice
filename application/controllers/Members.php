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

        
        public function view($member_acct)
        {
                $data['member'] = $this->Member_model->get_members($member_acct);

                if (empty($data['member']))
                {
                        show_404();
                }

                $data['title'] = $data['member']['member_name'];

                $this->load->view('templates/header', $data);
                $this->load->view('members/view', $data);
                $this->load->view('templates/footer');


                
        }
        

        public function register_members()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = '新增會員資料';

                $this->form_validation->set_rules('account', '帳號', 'required');
                $this->form_validation->set_rules('password', '密碼', 'required');
                $this->form_validation->set_rules('checkPassword', '請再次輸入密碼', 'required');
                $this->form_validation->set_rules('name', '姓名', 'required');
                $this->form_validation->set_rules('phone', '電話', 'required');
                $this->form_validation->set_rules('email', '信箱', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('members/register_members');
                        $this->load->view('templates/footer');
                }
                else
                {
                        $this->Member_model->register_members();
                        $this->load->view('members/success');
                }
        }

        public function login_members()
        {	
    	
    	$check_data = $this->Member_model->login_members($this->input->post('account'));
    	if($check_data == ""){
    		echo "尚未註冊";
    	}
    	else{
    		if($check_data->password == $this->input->post('password')){
    			echo "登入成功!";
    		}
    		else{
    			echo "登入失敗!";
    		}
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
        public function home(){


                $this->load->view('templates/header');
                $this->load->view('members/home');
                $this->load->view('templates/footer');
        }
}
?>