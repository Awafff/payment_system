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
						$fullnameOrder = $order->fullname_user; 
						$emailOrder = $order->email_user;
						$dateOrder = $order->date_order;
						$statusOrder = $order->status_order;
					?>
					<td><?php echo $fullnameOrder; ?></td>
					<td><?php echo $emailOrder; ?></td>
					<td><?php echo $dateOrder; ?></td>
					<td><?php echo $statusOrder; ?></td>
					<td></td>
				</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>

</div>