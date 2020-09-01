<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php $this->load->view('component/v_head');?>
</head>
<body>
	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
	<?php //$this->load->view('component/v_component_out_navigation');?>
	<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 bodyContent" height="100%" style="padding: 5% 50px;">

		<?php echo form_open('login') ?>
				<div class="col-md-4"></div>
				<div class="col-md-4 col-sm-12 col-lg-4 col-xs-12 loginBox thumbnail">
					<div class="col-md-12 zeroPadding"><h1>Login</h1></div>

					<div class="input-group col-md-12 col-sm-12 col-lg-12">
						<span class="input-group-addon groupIcon"><b class="fa fa-user"></b></span>
						<input class="input-group-addon insertForm form-control" type="text" name="username" placeholder="username" width="100%" required>
					</div>

				    <br>


					<div class="input-group col-md-12 col-sm-12 col-lg-12">
						<span class="input-group-addon groupIcon"><b class="fa fa-lock"></b></span>
						<input class="input-group-addon insertForm form-control" type="password" name="password" placeholder="password" width="100%" required>
					</div>
					<p>

					<div class="form-group">	
						<button  class=" col-md-12 col-sm-12 col-lg-12 col-xs-12 btn btn-primary btn-lg" type="submit" name="submit"><b class="	pull-left">Login</b> <span class="fa fa-arrow-right pull-right"></span></button>
						<!--
				   		    <p><a href="">lupa password ?</a></p>
							<center><span>atau</span></center>

			   		   	<a class="submitBox col-md-12 col-sm-12 col-lg-12 col-xs-12  submitBoxPosition btn" href="<?php //echo base_url();?>registration
				   		   	">Mendaftar</a>-->
				   	</div>
					</p>



			    <div class="col-md-4"></div>
			</form>
	</div>
</div>
	
<?php //$this->load->view('component/v_component_footer_fixed');?>
<script type="text/javascript">
	$('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>
</body>
</html>