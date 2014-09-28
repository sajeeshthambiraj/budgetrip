<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author saji
 */
class Login extends CI_Controller{
 
     public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}
        
        public function auth()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
           
            
            $this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');

             $data['title'] = ucfirst('login');
           if ($this->form_validation->run() === FALSE) 
           {
                $this->load->view('gen/header', $data);
                $this->load->view('login_view', $data);
                $this->load->view('gen/footer', $data);
           }
           else 
           {
            
               $result = $this->login_model->check_user_exist();
               if(!empty($result))
               {
                   
                   $this->load->helper('url');
                   $this->load->library('session');
                   
                   $my_session = array ('username' => $this->input->post('username'));
                   $this->session->set_userdata($my_session);
                   
                   
                   $url = 'home/user';
                   redirect($url);
                  
                   
               }
               else 
               {
                    $data['validation_error']= array ('Invalid User name or password.');
                    $this->load->view('gen/header', $data);
                    $this->load->view('gen/validation_error', $data);
                    $this->load->view('login_view', $data);
                    $this->load->view('gen/footer', $data);
               }
               
           }
    }
}
