<?php

class Pages extends CI_Controller {
    
        public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}


	public function view($page = 'home')
	{   
            
	if ( ! file_exists(APPPATH.'/views/'.$page.'.php'))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}

	$data['title'] = ucfirst($page); // Capitalize the first letter
        $data['news'] = $this->news_model->get_news();
        
	$this->load->view('gen/header', $data);
	$this->load->view($page, $data);
	$this->load->view('gen/footer', $data);
	}
        
        public function create()
        {
            
	$this->load->helper('form');
	$this->load->library('form_validation');

	$data['title'] = 'Create a user';

	$this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('text', 'text', 'required');

	if ($this->form_validation->run() === FALSE)
	{
            
            $this->load->view('gen/header', $data);
            $this->load->view('about', $data);
            $this->load->view('gen/footer', $data);

	}
	else
	{
          
		$this->news_model->insert_user();
                echo "success";
		$this->load->view('gen/header', $data);
                $this->load->view('about', $data);
                $this->load->view('gen/footer', $data);
	}
            
        }
}
