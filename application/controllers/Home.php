<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model("ArticleModel","AM");
		$result = $this->AM->Fetch_Articles();
		// print_r($result);die();
		$data['result']=$result;
		$this->load->view('blog_list',$data);
	}

	public function blog_details($blog_id=0){
		// die($blog_id);
		$this->load->model("ArticleModel","AM");
		$result = $this->AM->Fetch_Article_detailed($blog_id);
		// print_r($result);die();
		$data['result']=$result;
		$this->load->view('blog_details',$data);
	}



}
