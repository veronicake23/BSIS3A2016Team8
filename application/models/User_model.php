<?php 

class User_model extends CI_Model {
			
			public function __construct() {
				parent::__construct();
			}
			
		  public function create_member()
		  {
			  $enc_password =  md5($this->input->post('password'));
			  $data = array (
					'name' => $this->input->post('name'),
					'surname' => $this->input->post('surname'),
					'username' => $this->input->post('username'),
					'password' => $enc_password
			  );
			  
				$this->db->insert('users', $data);
		
				return $this->db->insert_id();
		  }
		  public function login_user($username, $password)
		  {
			  $enc_pass = md5($password);
			  
			  
			  $this->db->where('username', $username);
			
			  $this->db->where('password', $enc_pass);
			  
			  $result = $this->db->get('users');
			  if($result->num_rows() == 1)
			  {
				  return $result->row(0)->id;
			  }
			  else
			  {
				  return FALSE;
			  }
		  }
		public function addthread()
		{
			
			
			
			$data = array( 'username' =>$this->input->post('username'),
							'Title' =>$this->input->post('title'),
							'Description' =>$this->input->post('description'),
							'Category' =>"Science and Technology",
							'Date' =>date('d-m-Y H:i:s'),
							);
							$this->db->insert('thread', $data);
		
							return $this->db->insert_id();
		}
		public function get()
		{
			
		$query = $this->db->select('*')->from('thread')->get();
		return $query->result();
		}
		public function get_thread($thread_id = NULL)
		{
			if(!isset($thread_id) && $thread_id = NULL){
				$query = $this->db->get('thread');
			}
			else{
				$this->db->where('thread_id', $thread_id);
			$query = $this->db->get('thread');
		
			
			}
			return $query->row();
			
		}
		public function edit_thread($data, $id)
		{
							$this->db->get('users');
							$this->db->where('id', $id);
							$this->db->update('thread', $data);
							return TRUE;
							
		}
		
		public function update($data, $thread_id){
				$this->db->where('thread_id', $thread_id);
				$this->db->update('thread',$data);
				
			}
		public function delete_thread($thread_id){
			$this->db->where('thread_id', $thread_id);
			$this->db->delete('thread');
			return TRUE;
		}
		public function get_post($thread_id = NULL){
				if(!isset($thread_id) && $thread_id = NULL){
				$query = $this->db->get('post');
			}
			else{
				$this->db->where('thread_id', $thread_id);
			$query = $this->db->get('post');
			
			}
			return $query->result();
		}
		
		
}
?>