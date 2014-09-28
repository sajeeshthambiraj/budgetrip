<?php

class Logout extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
    }
    
    public function user()
    {
         $this->load->helper('url');
         $this->load->library('session');
                   
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        
        $url = 'login/auth';
        redirect($url);
        
        
    }
}
