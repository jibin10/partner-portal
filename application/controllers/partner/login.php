<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->model('partner','',TRUE);
    }
	
	public function index()
	{
		$this->load->view('partner/login');
	}
	
	public function register()
	{
		$this->load->view('partner/register');
	}
	
	public function add_partner()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|email|required|xss_clean');
		$this->form_validation->set_rules('company', 'Company', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
		
		 if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            $this->load->view('register');
        }
        else
        {
            $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'company' => $this->input->post('company'),
            'password' => MD5($this->input->post('password')),
            'message' => $this->input->post('message'),
            'role' => "view",
			'status' => "allow"
        );
		
		$this->partner->register($data);
		$this->session->set_flashdata('msg', 'Successfully registered. Your account will be activated soon');
		redirect('register', 'refresh');

        }

			
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */