<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');	

/****************************
    Model Map
	1) Site Title
	2) Login
****************************/

class md_login extends CI_Model {
	
	// 1) Site Title
	public function site_title($id){
		$this->db->where('id', $id);
		$query = $this->db->get('seo');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}	
	
	// 2) Login
	public function login($data){		
		$LogData = array('email' => $data['email']);	
		$result = $this->db->get_where('user',$LogData);		
		if ($result -> num_rows() == 1) {
			$user_data = array(
				'id' => $result -> row(0) -> id , 
				'image' => $result -> row(0) -> image,
				'first_name' => $result -> row(0) -> first_name,
				'last_name' => $result -> row(0) -> last_name,
				'dob' => $result -> row(0) -> dob,
				'mobile' => $result -> row(0) -> mobile,
				'link' => $result -> row(0) -> web_link,
				'email' => $result -> row(0) -> email,
				'gender' => $result -> row(0) -> gender,
				'position' => $result -> row(0) -> position,
				'address' => $result -> row(0) -> address,
				'password' => $result -> row(0) -> password,
				'joined' => $result -> row(0) -> joined
			);				
			$this->session->set_userdata($user_data);
			return $user_data;
		}else{ 
			return FALSE; 
		}
	}
	
	// 3) Single User Data
	public function single_user_data($email){
		$this->db->where('email', $email);
		$query = $this->db->get('user');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

 }