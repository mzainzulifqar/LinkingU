<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_user($limit ,$offset){
		$result = $this->db->limit($limit,$offset)->get('user')->result_array();
		return $result;
	}


	

	public function get_user_by_id($id)
	{		
		//$this->db->where('id',$id);
		$result = $this->db->get_where('user',array(
			'id'=>$id
		))->result_array();
		return $result;
	}

	
	

		
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

	

	public function pagination(){

		$result = $this->db->get('user')->result_array() ;
		$count = count($result);
		return $count;
	}

	//image upload
	

	public function post_data($id){
		$this->db->where('user_id',$id);
		$result = $this->db->get('post');
		if($result->num_rows() > 0)
		{
			return $result->result_array();
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


	public function comment_details($id)
	{
		$this->db->where('post_id',$id);
		$result = $this->db->get('comments');
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
		else
		{
			return false;
		}
	}

	public function comment_delete($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('comments');
		
		if (condition) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function delete_all_user(){

		$result = $this->db->query('DELETE FROM user');
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function delete_all_comment(){

		$result = $this->db->query('DELETE FROM comments');
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}

	}


	public function delete_all_post(){

		$result = $this->db->query('DELETE FROM post');
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function stat()
	{
		$comment = $this->db->get('comments	')->result_array();
		$user = $this->db->get('user')->result_array();
		$message = $this->db->get('messages')->result_array();
		$data = array(
			'comment' => $comment,
			'user'=> $user,
			'messages' => $message


		);
		return $data;

	}

	public function login($email,$password)
	{
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$result = $this->db->get('user');
		if($result->num_rows() > 0)
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