<?php 

class User_model extends CI_Model{

	function auth($username, $password){

		$this->db->select('id_user, username_user, fullname_user, email_user, type_user');
		$this->db->from('user');
		$this->db->where(array('username_user'=>$username, 'password_user'=>md5($password)));

		if($getUser=$this->db->get()){
			return $getUser->row_array();
		}else{
			return false;
		}
	}

}
