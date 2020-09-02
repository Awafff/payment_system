<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Order_model');
	}

	function push($idProduct, $priceProduct){
		$idUser = $this->session->userdata('userIdSessionPSys');
		$typeUser = $this->session->userdata('userTypeSessionPSys');

		if (!empty($idUser) && !empty($idProduct) && !empty($priceProduct) && $typeUser == 'user') {
			$order = $this->Order_model->push($idUser, $idProduct, $priceProduct);
			if ($order == true) {
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
					<h4>Error</h4>
					<p>Order Product Success...</p>
				</div>');
				redirect('dashboard');				
			}else if ($order == false) {
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
					<h4>Error</h4>
					<p>Order Product Failed!!!</p>
				</div>');
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning">
					<h4>Warning</h4>
					<p>Error!!!</p>
				</div>');
				redirect('dashboard');				
			}
		}else{
			redirect('login');
		}
	}

	function delete($idOrder){
		$idUser = $this->session->userdata('userIdSessionPSys');

		if (!empty($idUser) && !empty($idOrder)) {
			$order = $this->Order_model->delete($idOrder);

			if ($order == 'true') {
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
					<h4>Success</h4>
					<p>Order Canceled Successfully...</p>
				</div>');
				redirect('dashboard');				
			}else if ($order == 'false') {
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
					<h4>Failed</h4>
					<p>Order Cancelation Failed!!!</p>
				</div>');
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning">
					<h4>Warning</h4>
					<p>Error!!!</p>
				</div>');
				redirect('dashboard');				
			}
		}else{
			redirect('login');
		}		
	}

	function activate($idOrder){
		$idUser = $this->session->userdata('userIdSessionPSys');

		if (!empty($idUser) && !empty($idOrder)) {
			$order = $this->Order_model->put($idOrder, 'paid');

			if ($order == 'true') {
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
					<h4>Success</h4>
					<p>Order Paid Successfully...</p>
				</div>');
				redirect('dashboard');				
			}else if ($order == 'false') {
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
					<h4>Failed</h4>
					<p>Order Paid Failed!!!</p>
				</div>');
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-warning">
					<h4>Warning</h4>
					<p>Error!!!</p>
				</div>');
				redirect('dashboard');				
			}
		}else{
			redirect('login');
		}		
	}

	function confirmation($idOrder){
		$idUser = $this->session->userdata('userIdSessionPSys');
		$typeUser = $this->session->userdata('userTypeSessionPSys');

		if (!empty($idUser) && !empty($idOrder) && $typeUser == 'user') {

			if(isset($_POST['submit'])){
				$id 		= $this->input->post('idUser');
				// $image		= $this->input->post('image');
				$message 	= $this->input->post('message');

				echo '<br> : '.$id;

				echo '<br> : '.$message;


				if ($idUser == $id  ) {

					$this->load->library('upload');
					$date = date('YmdGis');
					$imageName = $id.$date.$idOrder;
					$config['upload_path'] = 'assets/img/payment_confirmation/';
					$config['file_name'] = $imageName;
					$config['allowed_types'] = 'jpg';
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;

					$config['max_size'] = 300;
					$config['max_width'] = 1200;
					$config['max_height'] = 1000;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if ($this->upload->do_upload('imageUpload')) {
						$image = $config['upload_path'].$imageName.'.'.$config['allowed_types'];
						$insertConfirmation = $this->Order_model->confirmation($idOrder, $message, $image);

						if ($insertConfirmation == true) {
							$updateStatus = $this->Order_model->put($idOrder, 'waiting');
							if ($insertConfirmation == true) {
								$this->session->set_flashdata('msg', 
									'<div class="alert alert-success">
										<h4>Success</h4>
										<p>Payment Confirmation Successfully!!!</p>
									</div>');
								redirect('dashboard');
							}
						}else{
							$this->session->set_flashdata('msg', 
								'<div class="alert alert-danger">
									<h4>Failed</h4>	
									<p>Payment Confirmation Failed!!!</p>
								</div>');
							redirect('order/confirmation/'.$idOrder);
						}

					} else{
						unlink($imageName);

						$error = $this->upload->display_errors();
						$this->session->set_flashdata('msg', 
							'<div class="alert alert-danger">
								<h4>Error</h4>
								<p>Upload Image Failed!!!</p>
							    '.$error.'
							</div>');
						redirect('order/confirmation/'.$idOrder);
					}
					
				}else{
					// redirect('dashboard');
				}
			}else{
				$this->session->set_userdata('orderIdSessionPSys', $idOrder);
				$this->load->view('user/v_page_order_confirmation');
			}
		}else{
			redirect('login');
		}		
	}

	function vConfirmation($idOrder){
		$idUser = $this->session->userdata('userIdSessionPSys');
		$typeUser = $this->session->userdata('userTypeSessionPSys');

		if (!empty($idUser)) {
			if ($typeUser == 'admin') {
				$getPayment = $this->Order_model->userPayment($idOrder);
				$this->session->set_userdata('paymentDataSessionPSys', $getPayment);

				$this->load->view('admin/v_page_confirmation');
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}

}