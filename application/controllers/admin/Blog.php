<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index()
	{	
		  $query=$this->db->query("SELECT * FROM `articles` ORDER by `id` DESC");
		  $data['result']=$query->result_array();

		$this->load->view('adminpanel/view_blog',$data);
	}

// --------------------------------------------------------------------------------------------

	public function addblog()
	{
		$this->load->view('adminpanel/add_blog');
	}
// --------------------------------------------------------------------------------------------



	public function addblog_post(){
		// print_r($_POST);
		// print_r($_FILES);
		if ($_FILES) {
			// we got img to upload
			 $config['upload_path']          = './assets/uploads/blogimg/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('blogimage'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        die("ERRor");
                        // $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        // echo "<pre>";
                        // print_r($data);
                        // echo $data["upload_data"]["file_name"];
                        $ImgUrl="assets/uploads/blogimg/".$data["upload_data"]["file_name"];
                        $title=$_POST['blog_title'];
                        $description = $_POST['blog_desc'];
                        $insertDB = $this->db->query("INSERT INTO `articles`(`blog_title`, `blog_desc`, `blog_img`) VALUES ('$title','$description','$ImgUrl')");
                        if ($insertDB) {
                        	$this->session->set_flashdata('inserted', 'Data Inserted Successfully');
                        	redirect("admin/blog/addblog");
                        }
                }
		}
		else{
			// img is not posted
			$this->session->set_flashdata('inserted', 'Please select Image file.');
			redirect("admin/blog/addblog");

		}
	}

// --------------------------------------------------------------------------------------------


	public function editblog($blog_id){
		print_r($blog_id);
		$query = $this->db->query("SELECT  `blog_title`, `blog_desc`, `blog_img`, `status` FROM `articles` WHERE `id`='$blog_id'");

		$data['result'] = $query->result_array();
		$data['blog_id'] = $blog_id;

		$this->load->view("adminpanel/editblog",$data);

	}
// --------------------------------------------------------------------------------------------

	function editblog_post(){
		//print_r($_POST); die();

		print_r($_FILES);
		if ( $_FILES['file']['name'] ) {
			//die("Update File");		

			$config['upload_path']          = './assets/upload/blogimg/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    die("Error");
                    //$this->load->view('upload_form', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    /*echo "<pre>";
                    print_r($data['upload_data']['file_name']);
					*/
                    
                    $filename_location = "assets/upload/blogimg/". $data['upload_data']['file_name'];

                    $blog_title = $_POST['blog_title'];
                    $blog_desc = $_POST['blog_desc'];
                    $blog_id = $_POST['blog_id'];
                    $publish_unpublish = $_POST['publish_unpublish'];


                    $query = $this->db->query("UPDATE `articles` SET `blog_title`='$blog_title',`blog_desc`='$blog_desc',`blog_img`='$filename_location', `status`='$publish_unpublish' WHERE `id`='$blog_id'");

                    if ($query) {
                    	$this->session->set_flashdata('updated', 'yes');
                    	redirect("admin/blog");
                    }else{
                    	$this->session->set_flashdata('updated', 'no');
                    	redirect("admin/blog");
                    }
            }



		}else{
			//die("Update without file");
			$blog_title = $_POST['blog_title'];
            $blog_desc = $_POST['blog_desc'];
            $blog_id = $_POST['blog_id'];
            $publish_unpublish = $_POST['publish_unpublish'];


            $query = $this->db->query("UPDATE `articles` SET `blog_title`='$blog_title',`blog_desc`='$blog_desc', status='$publish_unpublish' WHERE `id`='$blog_id'");

            if ($query) {
            	$this->session->set_flashdata('updated', 'yes');
            	redirect("admin/blog");
            }else{
            	$this->session->set_flashdata('updated', 'no');
            	redirect("admin/blog");
            }
		}
	}

// --------------------------------------------------------------------------------------------



	function deleteblog(){
		// print_r($_POST);

		$delete_id = $_POST['delete_id'];

		$qu = $this->db->query("DELETE FROM `articles` WHERE `id`='$delete_id'");

		if ($qu) {
			echo "deleted";
		}else{
			echo "notdeleted";
		}

		//$this->

	}
// --------------------------------------------------------------------------------------------

// --------------------------------------------------------------------------------------------








}
