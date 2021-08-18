<?php
class Member_model extends CI_Model 
{
        
        public function __construct()
        {
                //資料庫連結
                $this->load->database();
        }

        public function get_members($member_acct = FALSE)
        {
                if ($member_acct == FALSE)//default select * from memberinfo
                {
                        $query = $this->db->get('memberinfo');
                        return $query->result_array();                        
                }
                else
                {
                        $query = $this->db->get_where('memberinfo', array('member_acct' => $member_acct));
                        return $query->row_array();
                }

                
        }

        public function register_members()
        {
                $this->load->helper('url');

                $data = array(
                        'member_name' => $this->input->post('name'),
                        'member_acct' => $this->input->post('account'),
                        'member_pawd' => $this->input->post('password'),
                        'member_phone'=> $this->input->post('phone'),
                        'member_email'=> $this->input->post('email'),
                        'system_state' => '1',
                );

                return $this->db->insert('memberinfo', $data);

        }
        public function login_members($account)
        {
                //我嘗試的寫法
                // $query= $this->db->query('SELECT member_acct ,member_pawd FROM memberinfo');
                // if ($query->num_rows() > 0)
                // {
                //         $row = $query->row();
                //         echo $row->member_acct;
                // }      
                $member_info =   $this->db->where('member_acct',$account)
                                        ->get('memberinfo')
                                        ->row();

                return $member_info;
        }

        public function remove_members()
        {
                $name = $this->input->post('member_name');
                $this->db->where('member_name', $name)->delete('memberinfo');
        }
        


}
?>