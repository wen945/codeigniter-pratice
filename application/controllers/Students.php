<?php
class Students extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Student_model');
        }


        public function index()
        {
                $data['all_student'] = $this->Student_model->get_students();
                $data['title'] = 'All Students';

                $this->load->view('templates/header', $data);
                $this->load->view('students/index', $data);
                $this->load->view('templates/footer');
        }
        public function create()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Create a new student';

                $this->form_validation->set_rules('student_name', 'Name', 'required');
                $this->form_validation->set_rules('text', 'text', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('students/create');
                        $this->load->view('templates/footer');
                }
                else
                {
                        $this->student_model->set_students();
                        $this->load->view('students/success');
                }
        }


}
?>