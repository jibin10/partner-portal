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
        $this->load->model('partner/discussion','',TRUE);
		$this->load->model('admin/announcement','',TRUE);
    }
	 
	public function index()
	{
	 if($this->session->userdata('logged_in'))	
	 {
	    $session_data = $this->session->userdata('logged_in');
     	$data['username'] = $session_data['username'];
		$data['title'] = "Partner Dashboard";
     	$this->load->view('partner/dashboard', $data);
	 } else {
	   
	 	$this->load->view('partner/login', 'refresh');
	 }
	 
	}
	
	public function exclusive_announcement()
	{
	 if($this->session->userdata('logged_in'))	
	 {
	    $session_data = $this->session->userdata('logged_in');
     	$data['username'] = $session_data['username'];
		$data['email'] = $session_data['email'];
		$data['company'] = $session_data['company'];
		$data['title'] = "Exclusive Announcements";
     	$this->load->view('partner/exclusive_announcement', $data);
	 } else {
	   
	 	$this->load->view('partner/login', 'refresh');
	 }
	 
	}
	
	public function general_announcement()
	{
	 if($this->session->userdata('logged_in'))	
	 {
	    $session_data = $this->session->userdata('logged_in');
     	$data['username'] = $session_data['username'];
		$data['title'] = "General Announcements";
		$data['announcements']=$this->announcement->get_announcement();
     	$this->load->view('partner/general_announcement', $data);
	 } else {
	   
	 	$this->load->view('partner/login', 'refresh');
	 }
	 
	}
	
	public function new_topic()
	{
	 if($this->session->userdata('logged_in'))	
	 {
	    $session_data = $this->session->userdata('logged_in');
     	$data['username'] = $session_data['username'];
		$data['user_id'] = $session_data['id'];
		$data['title'] = "New Topic";
     	$this->load->view('partner/new_topic', $data);
	 } else {
	   
	 	$this->load->view('partner/login', 'refresh');
	 }
	 
	}
	
	public function view_discussion()
	{
	 if($this->session->userdata('logged_in'))	
	 {
	    $session_data = $this->session->userdata('logged_in');
     	$data['username'] = $session_data['username'];
		$data['title'] = "View Discussion";
     	$this->load->view('partner/view_discussion', $data);
	 } else {
	   
	 	$this->load->view('partner/login', 'refresh');
	 }
	}
	
	public function email()
	{
	 if($this->session->userdata('logged_in'))	
	 {
	    $session_data = $this->session->userdata('logged_in');
     	$data['username'] = $session_data['username'];
		$data['title'] = "Email";
     	$this->load->view('partner/email', $data);
	 } else {
	   
	 	$this->load->view('partner/login', 'refresh');
	 }
	}
	
	public function insert_topic()
	{
	 if($this->session->userdata('logged_in'))	
	 {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('user_id', 'User', 'trim|required|xss_clean');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('details', 'Details', 'trim|required|xss_clean');
		
		 if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            $this->load->view('partner/new_topic');
        }
        else
        {
            $data = array(
            'userid' => $this->input->post('user_id'),
            'title' => $this->input->post('title'),
            'details' => $this->input->post('details')
            
        );
		
		$this->discussion->add_topic($data);
		$this->session->set_flashdata('msg', 'Topic created successfully');
		redirect('new-topic', 'refresh');

        }

		} else {
	   
	 	$this->load->view('admin/login', 'refresh');
	 }	
	}
	
	function logout()
   {
   	$this->session->unset_userdata('logged_in');
   	$this->session->sess_destroy();
   	redirect('partner/login', 'refresh');
   }
 
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */