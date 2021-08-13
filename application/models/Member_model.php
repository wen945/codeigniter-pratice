<?php
class Member_model extends CI_Model 
{
        
        public function __construct()
        {
                //資料庫連結
                $this->load->database();
        }

        public function get_members($system_id = true)
        {
                if ($system_id = true)//default select * from memberinfo
                {
                        $query = $this->db->get('memberinfo');
                        return $query->result_array();                        
                }

                $query = $this->db->get_where('memberinfo', array('$system_id' => $system_id));
                return $query->row_array();
        }
        
}
?>