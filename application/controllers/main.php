<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		 $this->load->library('form_validation');
		 $this->load->library('session');
		 $this->load->library('pagination');
		 $this->load->model("main_model");
		 date_default_timezone_set("Asia/karachi");
		 $this->load->helper('date');
		 //$this->load->driver('cache',array('adapter'=>'file'));
	}



	public function index()
	{

	
		$this->load->view('S_N/index');

	}

	public function search_result()
	{	
		$query = $this->input->get("search");
		$result['catagory'] = $this->main_model->search_result($query);


		$this->header();
		$this->load->view('S_N/search_post',$result);
	}





	public function password_reset(){


		$this->load->view('S_N/password_reset');
	}

	public function new_password($code){


		$this->load->view('S_N/new_password',['code' => $code]);
	}

	public function cache(){
		
		
		//$this->output->clear_all_cache();
		var_dump($this->output->delete_cache('/main/index'));
		//$this->cache->clear();
	}

	public function index_2()
	{

		
		$this->load->view('index');
	}

	public function sign_up()
	{
		$this->load->view('S_N/registration');
	}

	public function header(){

		$id = $this->session->userdata('id');

			$header['user'] = $this->main_model->get_user_data($id);
			$this->load->view('S_N/header',$header);

	}

	public function wall(){

		$data = $this->session->userdata('id');
		if(!empty($data))
		{	

			$num = $this->main_model->no_post();

			
			
			$config['base_url'] = base_url().'main/wall';
			$config['total_rows'] = $num;
			$config['per_page'] = 5;
			



			$config['full_tag_open']    = "<ul class='pagination'>";
        $config['full_tag_close']   = "</ul>";
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open']    = "<li>";
        $config['next_tagl_close']  = "</li>";
        $config['prev_tag_open']    = "<li>";
        $config['prev_tagl_close']  = "</li>";
        $config['first_tag_open']   = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open']    = "<li>";
        $config['last_tagl_close']  = "</li>";



			$this->pagination->initialize($config);
			
			
			

			$user= $this->main_model->get_user_data($data);
			
			$post = $this->main_model->post_fetch($config['per_page'],$this->uri->segment(3));
			
			$catagory = $this->main_model->catagory();
			
			$details['catagory'] = array(
				'user' => $user,
				'catagory' => $catagory,
				'post' => $post,
			

			);
			$this->header();
			$this->load->view('S_N/wall',$details);
	}


	else
	{
		redirect('/main/index','refresh');
	}
	}

	public function cache_insert()
	{
			$this->db->cache_delete_all();
	}
	
	public function members(){

		if($this->session->userdata('id') != '')
		{	
		
		$result  = $this->main_model->total_members();


		
		
		$config['base_url'] = base_url() ."main/members";
		$config['total_rows'] = $result;
		$config['per_page'] = 8;

		$config['full_tag_open']    = "<ul class='pagination'>";
        $config['full_tag_close']   = "</ul>";
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open']    = "<li>";
        $config['next_tagl_close']  = "</li>";
        $config['prev_tag_open']    = "<li>";
        $config['prev_tagl_close']  = "</li>";
        $config['first_tag_open']   = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open']    = "<li>";
        $config['last_tagl_close']  = "</li>";


		$this->pagination->initialize($config);

		$data['members'] = $this->main_model->members_data($config['per_page'],$this->uri->segment(3));



		$this->header();
		$this->load->view('S_N/members',$data);
	}
	else {
		redirect('/main/index','refresh');

	}
	}

	public function edit_account(){

		if($this->session->userdata('id') != '')
		{	

			$this->header();
			$id = $this->session->userdata('id');
				$user['details'] = $this->main_model->get_user_data($id);
			$this->load->view('S_N/edit_account',$user);
	}	
		else {
		redirect('/main/index','refresh');

	}

	}				

	public function view_profile($ids){

		if($this->session->userdata('id') != '')
		{
			$this->header();

			$user = $this->main_model->get_user_data($ids);
			$post = $this->main_model->single_user_post_fetch($ids);

			$data['details'] = array(
				'user' => $user,
				'post' => $post


			);
			

			$this->load->view('S_N/view_profile',$data);
		}
		else
		{
			redirect('/main/index','refresh');
		}
	}

	public function message(){
		if($this->session->userdata('id') != '')
		{


		$this->header();

			$id = $this->session->userdata('id');

			$result['messages']  = $this->main_model->get_user_message($id);

			
		$this->load->view('S_N/message',$result);
	}
		else
		{
			redirect('/main/index','refresh');
		}

	}

	public function comments($id){

		if($this->session->userdata('id') != '')
		{
			
			
			$user = $this->main_model->get_user_data($this->session->userdata('id'));
			$post_data= $this->main_model->get_single_post($id);

			$comment = $this->main_model->post_comments($id);
			
			$data['details'] = array(
				'user' => $user,
				'post' => $post_data,
				'comment' => $comment


			);
			$this->header();
			$this->load->view('S_N/comments',$data);
	}
	else
		{
			redirect('/main/index','refresh');
		}

 
	}

	

	// public function view_message($id){

	// 	if($this->session->userdata('id') != '')
	// 	{	
	// 		$this->header();
			
	// 		$result = $this->main_model->get_selected_message($id);
	// 		$this->load->view('S_N/view_message');
	// }
	// else
	// 	{
	// 		redirect('/main/index','refresh');
	// 	}
	// }

	public function send_message($receiver_id){

		if($this->session->userdata('id') != '')
		{
			$this->header();

			$result_ = $this->main_model->get_user_data($this->session->userdata('id'));//sender data

			$result = $this->main_model->get_user_data($receiver_id); //receiver data

			$data['results'] = array(
				'receiver_id' => $receiver_id,
				'receiver_data' => $result,
				'sender_data' => $result_
				
			);
			
			$this->load->view('S_N/send_message',$data);
	}
		else
		{
			redirect('/main/index','refresh');
		}

	}
 

	public function send(){

		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		$id = $this->input->post('receiver_id');

		if ($this->form_validation->run() == FALSE) {
				
				$this->send_message($id);		
				// redirect("/main/send_message/$id");
				//redirect("/main/send_message/$id",'refresh');


				return false;


		} else {
			
			$title = $this->input->post("title");
			$receiver_id = $this->input->post("receiver_id");
			$receiver_name = $this->input->post("receiver_name");
			$sender_name = $this->input->post("sender_name");
			$sender_id = $this->input->post("sender_id");
			$message = $this->input->post("message");


			$data = array(
				'sender_name' => $sender_name,
				'sender_id' => $sender_id,
				'receiver_name' => $receiver_name,
				'receiver_id' => $receiver_id,
				'msg_sub' => $title,
				'msg' => $message,
				'reply' => 'no',
				'status' => 'unread',
				'date' => date('d/m/y')




			);

			$result = $this->main_model->send($data);
			if($result)
			{
					$this->session->set_flashdata('success', 'Message Sent Successfully');
					redirect("/main/send_message/$id",'refresh');
					//$this->send_message($id);
					return false;
			}
		

		}
	}

	function logout(){
		$data = time();

		$user_id = $this->session->userdata('id');

		$arr = array(

			'last_login' => $data
		);
		$this->main_model->last_login($arr,$user_id);
		$this->session->unset_userdata('id');

		redirect('/main/index','refresh');
	}

	//Registration


	public function Registration(){
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
	
		$this->form_validation->set_rules('em', 'Email', 'trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('bdy', 'Birthday', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');

		if ($this->form_validation->run() == false) 
		{
			$this->sign_up();

			return false;
		} 

		else 
		{
				$fname = $this->input->post('fname');
			
				$email = $this->input->post('em');
				$password = $this->input->post('pass');
		        $country = $this->input->post('country');
				$birthday = $this->input->post('bdy');
				$gender = $this->input->post('gender');
				$data = array(
					'fname' => $fname,
					
					'email' =>$email,
					'password' => $password,
					'country' => $country,
					'birthday' => $birthday,
					'gender' => $gender,
					'image' => 'default.jpg',
					'reg_date' => date('d-m-y h:i:sa'),
					'status' => 'unverified',
					'verification_code' => mt_rand(),
					'posts' => 'no'


				);

				

				$result = $this->main_model->registration($data);
				if($result = true)
				{
					$this->session->set_flashdata('success', 'Registration Successful');
										redirect('main/index','refresh:5');

				}
				else 
				{
					$this->session->flashdata('error' , 'Registraion Unsuccessful Try again');
					redirect('main/sign_up','refresh');
				}
			
		}
	}
	//end of registration function

	public function login(){


		$this->form_validation->set_rules('email', 'Email', 'required|regex_match[/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

		if ($this->form_validation->run() == FALSE) {
					
				$this->index();
				return false;
		} 
		else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');


			$login_id  = $this->main_model->login($email,$password);
			

			if($login_id)
			{
			

				

				  $this->session->set_userdata('id' , $login_id);
				  // $data =   $this->session->set_userdata('email');
				  // echo $data;
					// echo $this->session->userdata('email');

				 //  die();
			

					redirect('/main/wall');
			}
			else
			{	

				
				$this->session->set_flashdata('failed_login','Invalid Username or Password');
				redirect('/main/index');
			}

		}
	}


	public function insert_post(){
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('message','Description','trim|required');
		$this->form_validation->set_rules('catagory', 'Catagory', 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			$this->wall();
			return false;
		}

		 else {
			$user_id = $this->input->post("user_id");
			$user_name = $this->input->post("user_name");
			$title = $this->input->post('title');
			$message = $this->input->post('message');
			$catagory = $this->input->post('catagory');

			$data = array(

				'user_id' => $user_id,
				'user_name' => $user_name,
				'catagory_id' => $catagory,
				'title' => $title,
				'content' => $message,
				'date' => date('d/m/y h:i:sa')


			);

			$result = $this->main_model->insert_post($data);
			if($result)
			{
				redirect("/main/wall",'refresh');
				return false;
			}
			else
			{
				$this->session->set_flashdata('error', 'Something went wrong try again');
				redirect('/main/wall','refresh');
			}
		}

	}


	//updateing user data
	public function update_user_data(){

		$this->form_validation->set_rules('fname', 'Name', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'min_length[8]');

		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/social_network/theme/images';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '2000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('image')){
			

			// $error['error'] = array('error' => $this->upload->display_errors());
			
			// //$this->load->view('S_N/edit_account',$error);
			// $this->session->set_flashdata('file_upload' ,' Please Select a file to upload');
			// // $this->edit_account();
			// redirect("/main/edit_account","refresh");
			// return false;
			
			
		}
		

		if ($this->form_validation->run() == FALSE) {
			
			$this->edit_account();
			return false;
			
		} 
		else {

			$name = $this->input->post('fname');
			$id = $this->input->post('user_id');
			$about = $this->input->post("about_yourself");
			$password = $this->input->post('password');
			$data = $this->upload->data();
			$image = (!empty($data['file_name']))? $data['file_name']:'default.jpg';



			$result = array(
				
				'fname' => $name,
				'about_yourself'=> $about,
				'password' => $password,
				'image' => $image

			);


			
			
			$b = $this->main_model->update_user_data($result,$id);
			if($b)
			{
				redirect("/main/wall",'refresh');
				return false;
			}
			else
			{

			}
			
		}

	}


	public function add_comment()
	{
		$this->form_validation->set_rules('comment', 'Comment', 'required');

		$post_id = $this->input->post('post_id');

		if ($this->form_validation->run() == FALSE) {
			$this->comments($post_id);
			return false;
		} 

		else {
			
			$user_id = $this->input->post('login_user_id');
			$user_name = $this->input->post('login_user_name');
			$post_id = $this->input->post('post_id');
			$comment = $this->input->post("comment");

			$data = array(
				'post_id' => $post_id,
				'user_id' => $user_id,
				'comment' => $comment,
				'comment_auther' => $user_name,
				'date' => date('d/m/y h:i:sa')
			);

			$result  = $this->main_model->add_comment($data);
				
			if($result)
			{
				
				//$this->comments($post_id);
				redirect("/main/comments/$post_id",'refresh');
				return false;
				
			}
	



		}
	}


	//deleteing user account
	public function delete_account($id){

			$result = $this->main_model->delete_everything($id);

			if($result)
			{
				redirect('/main/index','refresh');
				return false;
			}
			else
			{	

				redirect('/main/edit_account');
				return false;
			}
	}


	public function delete_comment($comment_id = 0, $user_id = 0,$post_id = 0){

		$session_id = $this->session->userdata('id');
		if($session_id == $user_id)
		{
			$result = $this->main_model->delete_comment($comment_id);
			if($result)
			{
				$this->session->set_flashdata('success','Comment Deleted Successfully');
				redirect("/main/comments/$post_id");


			}
		}
		else
		{
			$this->session->set_flashdata('error','You are not allowed to delete this comment');
				redirect("/main/comments/$post_id");
		}


	}


	//reset user password

	public function password_reset_verify(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password_reset_code', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->password_reset();
		} else {
			$email = $this->input->post('email');
			$code  = $this->input->post('password_reset_code');


			$result = $this->main_model->password_reset($email,$code);
			if($result)
			{
				$this->new_password($code);

			}
			else
			{
					$this->session->set_flashdata('error','Invalid Email or Code');
					redirect('/main/password_reset');
			}
		}
	}

	//update user password
	public function user_new_password(){

		$this->form_validation->set_rules('password', 'Password', 'min_length[8]');
		if ($this->form_validation->run() == FALSE) {

			$this->new_password();
			return false;
		} 
		else {

				$password = $this->input->post('password');
				$code = $this->input->post('code');

				$result = $this->main_model->user_new_password($password,$code);

				if($result)
				{
					redirect('/main/index','refresh');
					return false;
				}

		}
	}


	public function user_post($id)
	{
		$result['details'] = $this->main_model->user_post($id);
		$this->header();
		$this->load->view('S_N/edit_user_post',$result);

	}


	public function delete_post($id,$user_id)
	{
		$result = $this->main_model->delete_post($id);

		if($result)
		{
			$this->session->set_flashdata('success', 'Deleted Successfully');
			redirect("/main/user_post/$user_id");
		}
		else
		{
			$this->session->set_flashdata('error', 'Something Wrong Occur');
			redirect("/main/user_post/$id");
		}
	}








	
}

?>
