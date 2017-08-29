<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('User_model');
	}
	
	
	
	public function index()
	{
		$this->load->view('TDC/interface');
	}
	
	
	public function login_result()
	{
		$condition=array();
		$username = $this->input->get_post('username');
		$userpw = $this->input->get_post('userpw');
		if(!empty($username))
		{
			$condition['User_Id'] = $username;
		}
		if(!empty($userpw))
		{
			$condition['User_Password'] = $userpw;
		}
		$data = $this->User_model->search_user($condition);
		if($data)
		{
		   $this->session->set_userdata($data);
		   $this->load->view('TDC/index');
		}
		else
		{
			$this->load->view('TDC/login');
		}
	}
	
	
	public function logout()
	{
		if(isset($_SESSION['User_Id']) && $_SESSION['User_Id'])
		{
			session_destroy();
			$this->load->view('TDC/login');
		}
	}
}
?>