<?php $dataOrder=$this->session->userdata('orderUserSessionPSys'); ?>
<h2><b>ORDER</b> <hr></h2>
<div class="panel panel-default">
	<?php if ($dataOrder == false): ?>
		<blockquote>Data Order Empty...</blockquote>
	<?php endif ?>
	<?php if ($dataOrder != false): ?>
		<?php foreach ($dataOrder->result() as $order): ?>

			<?php 
				$idOrder = $order->id_order; 
				$dateOrder = $order->date_order;
				$priceOrder = $order->price_order;
				$statusOrder = $order->status_order;
				$nameProduct = $order->name_product;
			?>
		<?php endforeach ?>

		<div class="panel-heading">
			<h3 class="panel-title">
				<b><?php echo $nameProduct; ?></b>

				<span class="pull-right">
					<?php if ($statusOrder == 'paid'): ?>
						<label class="label label-lg label-success"><?php echo $statusOrder; ?></label>
					<?php endif ?>
					<?php if ($statusOrder == 'unpaid' || $statusOrder == 'waiting'): ?>
						<label class="label label-warning"><?php echo $statusOrder; ?></label>
					<?php endif ?>
					<?php if ($statusOrder == 'cancel'): ?>
						<label class="label label-lg label-danger"><?php echo $statusOrder; ?></label>
					<?php endif ?>
				</span>
			</h3>
		</div>
		<div class="panel-body">
			Price : <b><?php echo $priceOrder; ?></b><br>
			Date : <i><?php echo $dateOrder; ?></i>

			<span class="pull-right">
				<a class="btn btn-danger" href="<?php echo base_url().'order/delete/'.$idOrder; ?>">
					<span class="fa fa-trash"></span> Remove
				</a>
				<a class="btn btn-success" href="<?php echo base_url().'order/confirmation/'.$idOrder; ?>">
					<span class="fa fa-envelope"></span> Confirmation
				</a>
			</span>
		</div>

	<?php endif ?>

</div>