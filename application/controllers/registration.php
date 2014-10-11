<?php

class Registration extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function step_one() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('firstname', 'Firstname', 'required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        $this->form_validation->set_rules('email', 'Email id', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[repassword]');
        $this->form_validation->set_rules('repassword', 'Retype Password', 'required');

        $data['title'] = ucfirst('step one');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('gen/header', $data);
            $this->load->view('registration/step_one', $data);
            $this->load->view('gen/footer', $data);
        } else {

            $result = $this->login_model->check_user_exist();
            if (empty($result)) {

                $this->load->helper('url');
                $this->load->library('session');

                $my_session = array('username' => $this->input->post('username'), 'reg_pos' => 1);
                $this->session->set_userdata($my_session);

                $url = 'registration/step_two';
                redirect($url);
            } else {
                $data['validation_error'] = array('This emailid is already registred with us!');
                $this->load->view('gen/header', $data);
                $this->load->view('gen/validation_error', $data);
                $this->load->view('registration/step_one', $data);
                $this->load->view('gen/footer', $data);
            }
        }
    }

    public function step_two() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        
       // $this->form_validation->set_rules('dob', 'Date of birth', 'required|valid_date[d-m-y,-]');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'required|required|integer|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('sa1', 'Answer for sequrity question 1', 'required');
        $this->form_validation->set_rules('sa2', 'Answer for sequrity question 2', 'required');

        $form_submit = $this->input->post('tostepthree');


        $data['title'] = $this->session->userdata('username');
        if ('NEXT' === $form_submit) {


            if ($this->form_validation->run() === FALSE) {

                $this->load->view('gen/header', $data);
                $this->load->view('registration/step_two', $data);
                $this->load->view('gen/footer', $data);
            } else {
                echo "validation succesfull";
            }
        } else if ('SKIP' === $form_submit) {
            echo "You will shortly redirected to step 3";

            $this->load->helper('url');
            $this->load->library('session');

            $this->session->unset_userdata('reg_pos');
            $this->session->set_userdata('reg_pos', 1);
            $url = 'registration/step_three';
            redirect($url);
        } else {
            echo "$form_submit";
            $this->load->view('gen/header', $data);
            $this->load->view('registration/step_two', $data);
            $this->load->view('gen/footer', $data);
        }
    }

    public function step_three() {
        $this->load->library('session');
        $this->load->helper('form');
        echo "Welcome ".$this->session->userdata('username');
        
    }

}
