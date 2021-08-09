<?php 

class User_model extends CI_Model{

	// function auth($username, $password){

	// 	$this->db->select('id_user, username_user, fullname_user, email_user, type_user');
	// 	$this->db->from('user');
	// 	$this->db->where(array('username_user'=>$username, 'password_user'=>md5($password)));

	// 	if($getUser=$this->db->get()){
	// 		return $getUser->row_array();
	// 	}else{
	// 		return false;
	// 	}
	// }

	function authUser($access, $username){

		$this->db->select('password_user');
		$this->db->from('user');
		if ($access == 'email') {
			$this->db->where(array('email_user'=>$username));
		}else if ($access == 'username') {
			$this->db->where(array('username_user'=>$username));
		}else{
			return false;
		}		
		

		if($getUser=$this->db->get()){
			return $getUser->row_array();
		}else{
			return false;
		}
	}

	function auth($access, $username, $password){

		$this->db->select('password_user');
		$this->db->from('user');
		$this->db->where(array($access.'_user'=>$username));
		

		$auth = '';
		if($authUser=$this->db->get()){
			$auth = $authUser->row_array();
		}else{
			return false;
		}


		if (password_verify($password, $auth['password_user'])) {
			$this->db->select('id_user, username_user, fullname_user, email_user, type_user');
			$this->db->from('user');

			$this->db->where(array($access.'_user'=>$username, 'password_user'=>$auth['password_user']));

			// $this->db->where(array('username_user'=>$username));

			if($getUser=$this->db->get()){
				return $getUser->row_array();
			}else{
				return false;
			}
		}else{
			return false;
		}




	}


}
