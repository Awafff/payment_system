<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('component/v_head');?>
	<title>Dashboard | </title>
	<?php 
		$typeUser = $this->session->userdata('userTypeSessionPSys');
		$unameUser = $this->session->userdata('userNameSessionPSys');
		$fnameUser = $this->session->userdata('userFullnameSessionPSys');
	?>


	<style type="text/css">
		.btnPosition{padding: 15px;}

		a.btn:hover {
			background: #b9b9b9;
			border: solid 1px #989898;
			font-weight: bold;
			color: #fff !important;
		}
	</style>
</head>
<body>
	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 

	<?php $this->load->view('component/v_nav');?>

		<div id="bodyContent" class="col-md-12">

			<div class="col-md-3">
				<?php $this->load->view('component/v_sidebar'); ?>
			</div>
			<div class="col-md-9">
				<div class="col-md-12 col-sm-12 col-xs-12 thumbnail">

					<h2 class="title"><span class="fa fa-th"></span> ORDER</h2>
					<hr>
					<table class="thumbnail">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Date</th>
								<th>Status Order</th>
								<th>Action</th>

							</tr>
						</thead>

					</table>
		

				</div>

				<hr> 


				<?php //$this->load->view('component/v_component_user_list'); ?>

			</div>
		</div>




	<?php $this->load->view('component/v_footer');?>
</body>
</html>