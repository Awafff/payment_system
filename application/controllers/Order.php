<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Order_model');
	}

	function index(){
		// $this->Order_model->getOrder()
	}

	function push($idProduct, $priceProduct){
		$idUser = $this->session->userdata('userIdSessionPSys');
		$typeUser = $this->session->userdata('userTypeSessionPSys');

		if (!empty($idUser) && !empty($idProduct) && !empty($priceProduct) && $typeUser == 'user') {
			$order = $this->Order_model->push($idUser, $idProduct, $priceProduct);
			if ($order == 'true') {
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
					<h4>Error</h4>
					<p>Order Product Success...</p>
				</div>');
				redirect('product');				
			}else if ($order == 'false') {
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
					<h4>Error</h4>
					<p>Order Product Failed!!!</p>
				</div>');
				redirect('product');
			}else{
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning">
					<h4>Warning</h4>
					<p>Error!!!</p>
				</div>');
				redirect('product');				
			}
		}else{
			redirect('login');
		}
	}

}