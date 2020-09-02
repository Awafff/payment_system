<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('component/v_head');?>
	<title>Dashboard | </title>
	<?php 

		$dataPayment = $this->session->userdata('paymentDataSessionPSys');
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
			<?php if ($dataPayment == false): ?>
				<td colspan="5">Data Order Empty...</td>
			<?php endif ?>
			<?php if ($dataPayment != false): ?>
				<?php foreach ($dataPayment->result() as $payment): ?>
					<?php 
						$idOrder 		= $payment->id_order;
						$statusOrder 	= $payment->status_order;

						$nameProduct	= $payment->name_product;
						$priceProduct	= $payment->price_product;

						$emailUser		= $payment->email_user;
						$nameUser		= $payment->fullname_user;
						$datePayment	= $payment->date_payment;
						$descriptPayment= $payment->descript_payment;

						$imgPayment		= $payment->img_payment;

					?>

					<div class="col-md-4">
						<div class="thumbnail">
							<img src="<?php echo base_url().$imgPayment; ?>">
						</div>

					</div>
				<div class="thumbnail col-md-8">
					<div class="col-md-12">
						<h3><b><?php echo $nameProduct; ?></b></h3>
						<h3>Rp. <?php echo $priceProduct; ?></h3>
						<table>
							
							<tr><td>Name : </td><td><?php echo $nameUser; ?></td></tr>
							<tr><td>Email : </td><td><?php echo $emailUser; ?></td></tr>
							<tr><td>Date :</td><td><?php echo $datePayment; ?></td></tr>
						</table>

						<textarea class="form-control"><?php echo $descriptPayment; ?></textarea>
					</div>
				</div>

					<div class="col-md-8">
						<?php if ($statusOrder == 'waiting'): ?>
							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<a class="btn btn-success col-md-12 col-sm-12 col-xs-12 col-lg-12" href="<?php echo base_url().'order/activate/'.$idOrder; ?>">
									<span class="fa fa-check"></span>
								</a>
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<a class="btn btn-danger col-md-12 col-sm-12 col-xs-12 col-lg-12" href="<?php echo base_url().'order/delete/'.$idOrder; ?>">
									<span class="fa fa-times"></span>
								</a>
							</div>

						<?php endif ?>
					</div>
				
				<?php endforeach ?>
			<?php endif ?>



			</div>
		</div>




	<?php $this->load->view('component/v_footer');?>
</body>
</html>