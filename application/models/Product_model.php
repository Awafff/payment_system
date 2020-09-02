<?php 
class Product_model extends CI_Model{

	function getProduct(){
		$this->db->select('*');
		$this->db->from('product');

		if($getProduct=$this->db->get()){
			if($getProduct->num_rows()>0){
				return $getProduct; 
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

}