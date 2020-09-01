<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Product_model');
	}



}