<?php
class ArticleModel extends CI_Model
{
	function Fetch_Articles(){
		$resultQuery = $this->db->query("SELECT * FROM `articles` WHERE `status`='1' ORDER BY id DESC");
		return $resultQuery->result_array();
	}

	function Fetch_Article_detailed($blog_id){
		// die($blog_id.' From Model');
		$resultQuery = $this->db->query("SELECT * FROM `articles` WHERE id = '$blog_id' ");
		return $resultQuery->result_array();
	}
}
?>