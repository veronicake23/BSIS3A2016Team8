<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 


class Users extends CI_Controller {
			public function __construct() {
				parent::__construct();
					}
	
	
		public function index()
		{
			$this->load->view('/login/loginform');
			
		}
		public function reg()
		{
			$this->load->view('/login/register');
		}
		
		public function start()
		{
			$this->load->model('User_model');
		
			$result['thread'] = $this->User_model->get();
			$this->load->view('/home/home', $result);
		}
		public function update()
		{
			$data['thread_id'] = $this->input->post('thread_id');
			$this->load->view('/home/update', $data);
		}
		public function add()
		{
			$this->load->view('home/addthread');
		}
		public function viewthread()
		{
			$this->load->model('User_model');
		
			$result['thread'] = $this->User_model->get();
			
			$this->load->view('/login/edit_user');
		}
	
		public function register()
		{
			
			$this->load->helper(array('form', 'url'));
			
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('surname', 'Surname', 'required');
			$this->form_validation->set_rules('username', 'Username', array('required', 'min_length[5]'));
			$this->form_validation->set_rules('password', 'Password', 'required',
									array('required' => 'You must provide a %s.'));	
			$this->form_validation->set_rules('cpassword','Confirm Password', array('required', 'matches[password]') );
										
			if($this->form_validation->run() == FALSE)
			{
			
				$this->load->view('/login/register');
				
			}
			else {
			$this->load->model('User_model');
			if($this->input->post())
			{
				
				$data = $this->input->post();
				$result = $this->User_model->create_member($data);
				
				$this->session->set_flashdata('registered', 'You are now registered and can log in');
				redirect('Users');
			}
			
		
			}	
		}	
		
		public function login()
		{
			
			$this->load->helper(array('form', 'url'));
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			
			if($this->form_validation->run())
			{
				
			}
			else
			{
				$this->load->model('User_model');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				$user_id = $this->User_model->login_user($username, $password);
				
				if($user_id)
				{
					// create array user data
					$user_data = array (
							'user_id' => $user_id,
							'username' => $username,
							'password' => $password
										);
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('correct', 'Login Success');
					
					
					redirect('Users/start');
				}
				else
				{ // setting error message
					$this->session->set_flashdata('error', 'Login Failed, please insert correct username and password');
					redirect('Users');
				}
			}
			
		}
		
		public function logout()
		{
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->sess_destroy(); //destroys the session data
			
			redirect('Users');
		}
		public function addthread()
		{
			$this->load->helper(array('form', 'url'));
			
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			
			if($this->form_validation->run() == FALSE)
			{
		
			}
			else
			{
				$this->load->model('User_model');
				if($this->input->post())
				{
					$data = $this->input->post();
					$result = $this->User_model->addthread($data);
					
					$this->session->set_flashdata('thread', 'Success, your thread has been added');
					redirect('Users/start');
					
				}
				
			}
		}
	
	
	public function edit_thread()
	{
		$data = array( 'Description' => $this->input->post('description'));
		
			$this->User_model->update($data,$this->input->post('thread_id'));
			redirect('Users/start');
	}
	public function view_thread($thread_id){
			$result['threads'] = $this->User_model->get_thread($thread_id);
		
		
			$this->load->view('/home/view', $result);
		
	}
	public function get_thread($thread_id)
	{
		
		$result['threads'] = $this->User_model->get_thread($thread_id);
		
		
		$this->load->view('/home/update', $result);
	}
	
	public function delete_thread($thread_id){
		$this->User_model->delete_thread($thread_id);
		redirect('Users/start');
	}
	public function view_post($thread_id){
		
			$results['posts'] = $this->User_model->get_post($thread_id);
		
			$this->load->view('/home/posts', $results);
		
	}
	
	
}
	

?>