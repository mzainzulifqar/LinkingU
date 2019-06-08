<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	//regitstration

	public function registration($data){

		$result = $this->db->insert('user',$data);

		if($result>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function login($email,$password)
	 {	
	// 	$this->db->where('email',$email);
	// 	$this->db->where('password',$password);	

		$result = $this->db->get_where('user',array('email' => $email,'password'=>$password));
		
		

		
		if($result->num_rows() > 0)
		{
			$id = $result->row()->id;
			return $id;
		}
		else 
		{
			return false;
		}
	}	

	//last_login

	public function last_login($data,$user_id)
	{
		$this->db->where('id',$user_id);
		$this->db->update('user',$data);
	}


	//fetching catagory


	public function catagory(){

		$catagory = $this->db->get('catagory')->result_array();
		if($catagory > 0)
		{
			return $catagory;
		}
		else
		{
			return false;
		}
	}


	//geting user data for wall

	public function get_user_data($data){

		//$this->db->cache_on();
		$this->db->where('id',$data);
		$result =  $this->db->get('user');
	
		if($result->num_rows()>0)
		{
			return $result->result_array();
		}
		else
		{
			return false;
		}

	}

	//inserting post data
	public function insert_post($data)
	{
		$result = $this->db->insert('post',$data);

		if($result > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	//fetching post data



	public function post_fetch($limit,$offset){
		
		$post = $this->db->limit($limit,$offset)->get('post')->result_array();
		if($post)
		{
			return $post;
		}
		else
		{
			return false;
		}
		
	}

	public function no_post(){

		$num_post = $this->db->get('post');
		if($num_post)
		{
			return $num_post->num_rows();
		}
		else
		{
			return false;
		}
	}

	//fetch only logined user post
		public function single_user_post_fetch($id){
		
		$post = $this->db->where('user_id',$id)->get('post')->result_array();
		if($post)
		{
			return $post;
		}
		else
		{
			return false;
		}
		
	}	


	//geting post data for comments
	public function get_single_post($id)
	{
		$this->db->where('id',$id);
		$data = $this->db->get('post');
		
			if($data->num_rows() > 0)
			{

				return $data->result_array();
			}
			else
			{
				return false;
			}

	}




	//fetching memebers data
	function members_data($limit,$offset){
		$result =  $this->db->limit($limit,$offset)->get('user');
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
		else
		{
			return false;
		}
	}

	//fetching members count

	public function total_members()
	{
		$result = $this->db->get('user');

		if($result->num_rows() > 0)
		{
			return count($result->result_array());
		}
		else
		{
			return false;
		}
	}


	public function update_user_data($data,$id){

		$this->db->where("id",$id);
		$result = $this->db->update("user",$data);
		if($result>0)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function add_comment($data)
	{
		$result = $this->db->insert('comments',$data);
		
		if($result>0)
		{
			return true;
		}
		else
		{
			return false;
		}

	}


	public function post_comments($id)
	{
		$this->db->where('post_id', $id);
		$result = $this->db->get('comments');
		// $this->db->join('comments', 'user.id = comment.user_id');
		// $result = $this->db->get('comments')->result_array();
	
	
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
		else
		{
			return false;
		}
	}


	public function send($data){
		$result = $this->db->insert('messages',$data);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}

	}


	public function get_user_message($id)
	{
		$this->db->where("receiver_id",$id);
		$received = $this->db->get('messages')->result_array();

		$this->db->where('sender_id',$id);
		$sent = $this->db->get('messages')->result_array();

		$data = array(
			'sent' => $sent,
			'received'=> $received

		);
		
		if(count($data))
		{
			return $data;
		}
		else{
			return false;
		}
	}


	public function get_selected_message($id)
	{
		$this->db->where('id',$id);
		$result = $this->db->get('messages');
		if($result->num_rows()>0)
		{
			return $result->result_array();
		}
		else
		{
			return false;
		}
	}

	//delete everything related to user

	public function delete_everything($id){

		$this->db->where('id',$id);
			$result_1 = $this->db->delete('user');

		// //deleting posts

		$this->db->where('user_id',$id);
			$result_2 = $this->db->delete('post');

		
		// //deleteing comments

			$this->db->where('user_id',$id);
			$result_3 = $this->db->delete('comments');
		//deleteing messages    
			$this->db->where('sender_id',$id);
			$result_4 = $this->db->delete('messages');

			$this->db->where('receiver_id',$id);
			$result_5 = $this->db->delete('messages');
			

			if($result_1 && $result_2 && $result_3 && $result_4)
			{
				return true;
			}
			else
			{
				return false;
			}
	}


	//delete single comment form post
	public function delete_comment($id)
	{
		$this->db->where('id',$id);
		$result = $this->db->delete('comments');
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	//reseting password

	public function password_reset($email,$code){

		$this->db->where('email',$email);
		$this->db->where('verification_code',$code);
		$result = $this->db->get('user');

		//$result = $this->db->query("select * from user where email = '$email' AND verification_code = '$code'")->result_array();
		
		if($result->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function user_new_password($password,$code)
	{
		$this->db->where('verification_code',$code);
		$this->db->set('password',$password);
		$result = $this->db->update('user');
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public function search_result($data)
	{
		$this->db->like('user_name',$data);
		$this->db->or_like('title',$data);
		$this->db->or_like('content',$data);
		$this->db->or_like('date',$data);
		$result = $this->db->get('post');

		if($result->num_rows() > 0)
		{
			return $result->result_Array();
		}
		else
		{
			return false;
		}
	}


	public function user_post($id)
	{
		$this->db->where("user_id",$id);
		$result = $this->db->get('post');

		if($result->num_rows() > 0)
		{
			return $result->result_Array();
		}
		else
		{
			return false;
		}
	}


	public function delete_post($id)
	{
		$this->db->where('id',$id);
		$result = $this->db->delete('post');
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>
<!-- /* End of file main_model.php */
/* Location: ./application/models/main_model.php */ -->