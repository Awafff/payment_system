<?php 
	$typeUser = $this->session->userdata('userTypeSessionPSys');
	$unameUser = $this->session->userdata('userNameSessionPSys');
	$fnameUser = $this->session->userdata('userFullnameSessionPSys');
?>

<div class="thumbnail">
 	<h3><span class="fa fa-user"></span> <?php echo $fnameUser; ?>
 		<br>
 		<small class="pull-right"><?php echo $unameUser; ?></small>
 	</h3>
</div>



<a class="btn btn-info col-md-12 col-xs-12" href="<?php echo base_url() ?>dashboard">
	<span class="fa fa-home pull-left"></span> <span class="pull-right">Dashboard</span>
</a>


<a class="btn btn-info col-md-12 col-xs-12" href="<?php echo base_url() ?>product">
	<span class="fa fa-list pull-left"></span> <span class="pull-right">Product List</span>
</a>

<a class="btn btn-danger col-md-12 col-xs-12" href="<?php echo base_url() ?>/user/logout">
	<span class="fa fa-sign-out pull-left"></span> <span class="pull-right">Logout</span>
</a>


	<!-- 
		- product list
		- order list
		- order confirmation

	 -->