<?php

class Login_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function check_user_exist()
    {
         $query = $this->db->get_where('login', array( 'uname' => $this->input->post('username'), 'password'=>  $this->input->post('password')));    
         /*if(!empty($query))
         {
             return FALSE;
         }
         else   
         {
             return TRUE;
         }
          * 
          */
         return $query->result_array();
    }
}
