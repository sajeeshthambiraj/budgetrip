<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author saji
 */
class Home extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
    }
    
    public function user()
    {
        $this->load->library('session');
        $this->load->helper('form');
        
        $data['username'] = $this->session->userdata('username');
        $data['title'] = ucfirst($data['username']);
        
        $this->load->view('gen/header', $data);
        $this->load->view('home_view', $data);
        $this->load->view('gen/footer', $data);
    }
}
