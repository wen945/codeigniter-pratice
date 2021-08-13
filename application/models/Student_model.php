<?php
class Student_model extends CI_Model 
{

        public function __construct()
        {
                $this->load->database();
        }

        public function get_students($number = -1)
		{
	        if ($number == -1)//default select * from class
	        {
	                $query = $this->db->get('class');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('class', array('number' => $number));
	        return $query->row_array();
		}

        public function set_students()
		{
		    $this->load->helper('url');

		    $number = rand();

		    $data = array(
		        'name' => $this->input->post('student_name'),
		        'number' => $number,
		        'intro' => $this->input->post('text'),
		        'gender' => '1',
		    );

		    return $this->db->insert('class', $data);
		}
}
?>
