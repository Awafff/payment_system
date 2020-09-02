<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Product_model');
	}

	function index(){
		$idUser = $this->session->userdata('userIdSessionPSys');
		$typeUser = $this->session->userdata('userTypeSessionPSys');

		if (!empty($idUser)) {
			$dataProduct = $this->Product_model->getProduct();

			$this->session->set_userdata('productListSessionPSys', $dataProduct);

			$this->load->view('user/v_page_product');
		}else{
			redirect('login');
		}
	}



}