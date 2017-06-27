<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct()
    {
        parent::__construct();
        $this->load->model('admin/announcement','',TRUE);
    }
	
	public function index()
	{
	 if($this->session->userdata('admin_logged_in'))	
	 {
	    $session_data = $this->session->userdata('admin_logged_in');
     	$data['username'] = $session_data['username'];
     	$this->load->view('admin/dashboard');
	 } else {
	   
	 	$this->load->view('login', 'refresh');
	 }
	 
	}
	
	public function announcement()
	{
	 if($this->session->userdata('admin_logged_in'))	
	 {
	    $session_data = $this->session->userdata('admin_logged_in');
     	$data['username'] = $session_data['username'];
		$data['title'] = "Manage Announcements";
		$data['announcements']=$this->announcement->get_announcement();		
     	$this->load->view('admin/manage_announcement', $data);
	 } else {
	   
	 	$this->load->view('admin/login', 'refresh');
	 }
	 
	}
	
	public function add_announcement()
	{
	 if($this->session->userdata('admin_logged_in'))	
	 {
	    $session_data = $this->session->userdata('admin_logged_in');
     	$data['username'] = $session_data['username'];
		$data['title'] = "Add Announcements";
     	$this->load->view('admin/add_announcement', $data);
	 } else {
	   
	 	$this->load->view('admin/login', 'refresh');
	 }
	 
	}
	
	public function insert_announcement()
	{
		if($this->session->userdata('admin_logged_in'))	
	 {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('user', 'User', 'trim|xss_clean');
		$this->form_validation->set_rules('title', 'Title', 'trim|xss_clean');
		$this->form_validation->set_rules('url', 'Url', 'trim|xss_clean');
		$this->form_validation->set_rules('details', 'Details', 'trim|required|xss_clean');
		
		 if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            $this->load->view('admin/add-announcement');
        }
        else
        {
            $data = array(
            'user' => $this->input->post('user'),
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'details' => $this->input->post('details')
            
        );
		
		$this->announcement->add_announcement($data);
		$this->session->set_flashdata('msg', 'Announcement successfully created');
		redirect('admin/add-announcement', 'refresh');

        }

		} else {
	   
	 	$this->load->view('admin/login', 'refresh');
	 }	
	}
	
	
	function logout()
   {
   	$this->session->unset_userdata('admin_logged_in');
   	$this->session->sess_destroy();
   	redirect('admin/login', 'refresh');
   }
 
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */