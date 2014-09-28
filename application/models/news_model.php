<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
        
        public function get_news($slug = FALSE)
        {
	if ($slug === FALSE)
	{
		$query = $this->db->get('login');
		return $query->result_array();
	}

	$query = $this->db->get_where('login', array('slug' => $slug));
	return $query->row_array();
        }
        
        public function insert_user()
        {
            
	$this->load->helper('url');

	$data = array(
		'uname' => $this->input->post('title'),
		'password' => $this->input->post('text')
                    );
        return $this->db->insert('login', $data);
        }
}

