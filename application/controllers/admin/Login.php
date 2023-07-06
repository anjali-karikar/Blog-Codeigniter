<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{	
		if (isset($_SESSION['user_id'])) {
			redirect("admin/dashboard");
		}

		$data=[];
		if (isset($_SESSION['error'])) {
			$data['error']=$_SESSION['error'];
		}

		$this->load->view('adminpanel/loginview',$data);
	}

	public function loginpost()
	{
		print_r($_POST);
		if (isset($_POST)) {
			$username=$_POST['username'];
			$password=$_POST['password'];
			$query=$this->db->query("SELECT * FROM `admin_user` WHERE `username`='$username' and `password`='$password'");
			if($query->num_rows()){
				// valid user
				$row=$query->result_array();
				// print_r($row);
				$this->session->set_userdata('user_id',$row[0]['id']);
				redirect("admin/dashboard");
			}
			else{
				// Invalid user
				$this->session->set_flashdata('error', 'Invalid Credentials');
				redirect("admin/login");
			}
		}
		else{
			die("Invalid Inputs");
		}
	}

	public function logout()
	{
		session_destroy();
		redirect("admin/login");
	}






}
