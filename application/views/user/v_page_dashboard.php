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

</head>
<body>
	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 

	<?php $this->load->view('component/v_nav');?>

		<div id="bodyContent" class="col-md-12">

			<div class="col-md-3">
				<?php $this->load->view('component/v_sidebar'); ?>
			</div>
			<div class="col-md-9">


				<?php 

					if ($typeUser == 'admin') {
						$this->load->view('admin/v_table_order'); 
					}else if($typeUser == 'user'){
						$this->load->view('user/v_panel_order'); 
						$this->load->view('user/v_thumbnail_product'); 
						
					}else{
						echo 'error';
					}

					
				?>


				<?php //$this->load->view('component/v_component_user_list'); ?>

			</div>
		</div>




	<?php $this->load->view('component/v_footer');?>
</body>
</html>