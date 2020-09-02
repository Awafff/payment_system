<?php 
class Order_model extends CI_Model{

	function getOrder(){
		$this->db->select('user.email_user, user.fullname_user, product_order.*');
		$this->db->from('product_order');
		$this->db->join('user','user.id_user = product_order.id_user');

		if($getOrder=$this->db->get()){
			if($getOrder->num_rows()>0){
				return $getOrder; 
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function push($idUser, $idProduct, $priceProduct){
		$queryCheckAnime = $this->db->get_where('product',array('id_product'=> $romajiAnimeTitle));
		if($queryCheckAnime->num_rows()>0){
			return false;
		}else{
			$dateOrder = date('Y-m-d G:i:s');
			$idOrder = $idUser.$idProduct.date('Ymd');
			$this->db->set('id_order', $idOrder);
			$this->db->set('id_user', $idUser);
			$this->db->set('id_product', $idProduct);
			$this->db->set('date_order', $dateOrder);
			$this->db->set('price_order', $priceProduct);
			$this->db->set('status_order', 'unpaid');
			$this->db->insert('product_order');

			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}	
	}

	
}