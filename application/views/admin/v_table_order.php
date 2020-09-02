<?php 
	$dataOrder = $this->session->userdata('orderListSessionPSys');
?>

<div class="thumbnail col-md-12 col-lg-12 col-sm-12 col-xs-12">

	<h2 class="title"><span class="fa fa-inbox"></span> ORDER</h2>
	<hr>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Date</th>
				<th>Status Order</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($dataOrder == false): ?>
				<td colspan="5">Data Order Empty...</td>
			<?php endif ?>
			<?php if ($dataOrder != false): ?>
				<?php foreach ($dataOrder->result() as $order): ?>
				<tr>
					<?php 
						$idOrder = $order->id_order; 
						$fullnameOrder = $order->fullname_user; 
						$emailOrder = $order->email_user;
						$dateOrder = $order->date_order;
						$statusOrder = $order->status_order;
					?>
					<td><?php echo $fullnameOrder; ?></td>
					<td><?php echo $emailOrder; ?></td>
					<td><?php echo $dateOrder; ?></td>
					<td><?php echo $statusOrder; ?></td>
					<td>
						
						<?php if ($statusOrder == 'waiting'): ?>
							<a class="btn btn-xs btn-primary" href="<?php echo base_url().'/order/vConfirmation/'.$idOrder; ?>">
								<span class="fa fa-eye"></span>
							</a>
							<a class="btn btn-xs btn-success" href="<?php echo base_url().'order/activate/'.$idOrder; ?>">
								<span class="fa fa-check"></span>
							</a>							
						<?php endif ?>
						<?php if ($statusOrder != 'paid' && $statusOrder != 'cancel'): ?>
							<a class="btn btn-xs btn-danger" href="<?php echo base_url().'order/delete/'.$idOrder; ?>">
								<span class="fa fa-times"></span>
							</a>
						<?php endif ?>
					</td>
				</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>

</div>