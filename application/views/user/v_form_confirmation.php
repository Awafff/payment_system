<?php 

	$id = $this->session->userdata('userIdSessionPSys');
	$name = $this->session->userdata('userFullnameSessionPSys');
	$email = $this->session->userdata('userEmailSessionPSys');
	$idOrder = $this->session->userdata('orderIdSessionPSys');

?>

<h2><b>ORDER</b> <hr></h2>
<?php echo form_open_multipart('order/confirmation/'.$idOrder) ?>
	<input class="hidden" type="text" name="idUser" value="<?php echo $id; ?>">

	<div class="form-group col-md-6 col-sm-6 col-xs-12 col-lg-6">
		<label class="col-md-12 col-sm-12 col-xs-12 col-lg-12">Name</label>
		<input class="form-control col-md-12 col-sm-12 col-xs-12 col-lg-12" type="text" name="fullname" value="<?php echo $name; ?>" required disabled>
		
	</div>
	<div class="form-group col-md-6 col-sm-6 col-xs-12 col-lg-6">
		<label class="col-md-12 col-sm-12 col-xs-12 col-lg-12">Email</label>
		<input class="form-control col-md-12 col-sm-12 col-xs-12 col-lg-12" type="text" name="email" value="<?php echo $email; ?>" required disabled>
	</div>

	<div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-12">
		<label class="col-md-12 col-sm-12 col-xs-12 col-lg-12">Picture <small class="pull-right">*transfer evidence</small></label>
		<input class="form-control col-md-12 col-sm-12 col-xs-12 col-lg-12" type="file" name="imageUpload" value="" required>
	</div>

	<div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-12">
		<label class="col-md-12 col-sm-12 col-xs-12 col-lg-12">Message</label>
		<textarea class="form-control col-md-12 col-sm-12 col-xs-12 col-lg-12" name="message"></textarea>
	</div>

	<div class="form-group">
		<center>
		<button class="btn btn-success" type="submit" name="submit">
			<span class="fa fa-envelope"></span> 
			Submit
		</button>
		</center>
   	</div>
</form>