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

	function userOrder($idUser){
		$this->db->select('product_order.id_user, product_order.*, product.*');
		$this->db->from('product_order');
		$this->db->join('product','product.id_product = product_order.id_product');
		$this->db->where(array('product_order.id_user'=>$idUser, 'product_order.status_order !='=>'cancel'));

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

	function userPayment($idOrder){
		$this->db->select('user.email_user, user.fullname_user, product_payment.*, product_order.*, product.*');
		$this->db->from('product_payment');
		$this->db->join('product_order','product_payment.id_order = product_order.id_order');
		$this->db->join('product','product.id_product = product_order.id_product');
		$this->db->join('user','user.id_user = product_order.id_user');
		$this->db->where(array('product_payment.id_order'=>$idOrder));

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
		$checkProduct = $this->db->get_where('product',array('id_product'=> $idProduct));
		if($checkProduct->num_rows()>0){
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
		}else{
			return false;
		}	
	}

	function delete($idOrder){
		$checkOrder = $this->db->get_where('product_order',array('id_order'=> $idOrder));

		if($checkOrder->num_rows()>0){
			$this->db->set('status_order', 'cancel');
			
			$this->db->where('id_order', $idOrder);
			$this->db->update('product_order');
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}else{	
			return false;
		}	
	}

	function put($idOrder, $status){
		$checkOrder = $this->db->get_where('product_order',array('id_order'=> $idOrder));
		if($checkOrder->num_rows()>0){
			$this->db->set('status_order', $status);
			
			$this->db->where('id_order', $idOrder);
			$this->db->update('product_order');
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}else{	
			return false;
		}	
	}
	
	function confirmation($idOrder, $message, $image){
		$checkOrder = $this->db->get_where('product_order',array('id_order'=> $idOrder));
		if($checkOrder->num_rows()>0){

			$datePayment = date('Y-m-d G:i:s');
			$idPayment = $idOrder.date('Ymd');

			$this->db->set('id_payment', $idPayment);
			$this->db->set('date_payment', $datePayment);
			$this->db->set('img_payment', $image);
			$this->db->set('descript_payment', $message);
			$this->db->set('id_order', $idOrder);

			$this->db->insert('product_payment');

			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}else{	
			return false;
		}	
	}
}