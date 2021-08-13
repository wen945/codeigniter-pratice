<?php
class Member_model extends CI_Model 
{
        
        public function __construct()
        {
                //資料庫連結
                $this->load->database();
        }

        public function get_members($number = FALSE)
        {
                if ($number == FALSE)//default select * from memberinfo
                {
                        $query = $this->db->get('memberinfo');
                        return $query->result_array();                        
                }
                else
                {
                        $query = $this->db->get_where('memberinfo', array('number' => $number));
                        return $query->row_array();
                }

                
        }
        public function set_members()
		{
                        $this->load->helper('url');

                        $number = rand();

                        $data = array(
                                'member_name' => $this->input->post('member_name'),
                                'member_acct' => $this->input->post('member_acct'),
                                'member_pawd' => $this->input->post('member_pawd'),
                                'number'=> $number,
                                'system_state' => '1',
		    );

		    return $this->db->insert('memberinfo', $data);
		}
        public function remove_members()
        {
                $name = $this->input->post('member_name');
                $this->db->where('member_name', $name)->delete('memberinfo');
        }


}
?>