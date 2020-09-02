<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('User_model');
	}


	function index(){
		echo 'Welcome...<br>';
	}

	function login(){
		$Id = $this->session->userdata('userIdSessionPSys');

		if ($Id) {
			redirect('dashboard');
		}

		if(isset($_POST['submit'])){

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$auth = $this->User_model->auth($username, $password);

			if ($auth != false) {
				$this->session->set_userdata('userIdSessionPSys', $auth['id_user']);
				$this->session->set_userdata('userTypeSessionPSys', $auth['type_user']);
				$this->session->set_userdata('userNameSessionPSys', $auth['username_user']);
				$this->session->set_userdata('userFullnameSessionPSys', $auth['fullname_user']);
				$this->session->set_userdata('userEmailSessionPSys', $auth['email_user']);
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
					<h4>Error</h4>
					<p>Username or Password not match!!!</p>
				</div>');
				redirect('login');
			}
		}else {

			$this->load->view('user/v_page_login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}


	function dashboard(){
		$idUser = $this->session->userdata('userIdSessionPSys');
		$typeUser = $this->session->userdata('userTypeSessionPSys');

		if (!empty($idUser)) {
			if (!empty($typeUser)) {
				if ($typeUser == 'admin') {
					$this->load->model('Order_model');
					$dataOrder = $this->Order_model->getOrder();
					$this->session->set_userdata('orderListSessionPSys', $dataOrder);					
				}elseif ($typeUser == 'user') {
					$this->load->model('Order_model');
					$dataOrder = $this->Order_model->userOrder($idUser);
					$this->session->set_userdata('orderUserSessionPSys', $dataOrder);
					$this->load->model('Product_model');
					$dataProduct = $this->Product_model->getProduct();
					$this->session->set_userdata('productListSessionPSys', $dataProduct);
				}
				
				$this->load->view('user/v_page_dashboard');
			}else{
				redirect('login');
			}
			
		}else{
			redirect('login');
		}
	}


}

