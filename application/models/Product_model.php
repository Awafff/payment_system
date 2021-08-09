<?php 
class Product_model extends CI_Model{

	function getProduct(){
		// $ci =& get_instance();
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

	

	function getProductById($id){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where(array('product_id'=>$id));

		if($getProduct=$this->db->get()){
			if($getProduct->num_rows()>0){
				return $getProduct->row_array(); 
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

}