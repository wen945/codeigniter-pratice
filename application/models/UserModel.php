<?php

class UserModel extends CI_Model
{
    public function loginMember($data)
    {
        
        $this->db->select('member_acct ,member_pawd ,member_name,member_phone');
        $this->db->from('memberinfo');
        $this->db->where('member_acct',$data['email']);
        $this->db->where('member_pawd',$data['password']);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->row();
        }else{
             return false;
        }
    }

    public function registerMember($data)
    {
        return $this->db->insert('memberinfo',$data);
    }

    


    
    




}
?>