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
		<?php endif ?>

	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $nameProduct; ?></h3>

		<small class="pull-right">
			<?php if ($statusOrder == 'paid'): ?>
				<label class="label label-success"><?php echo $statusOrder; ?></label>
			<?php endif ?>
			<?php if ($statusOrder == 'unpaid'): ?>
				<label class="label label-warning"><?php echo $statusOrder; ?></label>
			<?php endif ?>
			<?php if ($statusOrder == 'cancel'): ?>
				<label class="label label-danger"><?php echo $statusOrder; ?></label>
			<?php endif ?>
		</small>
	</div>
	<div class="panel-body">
			Price : <b><?php echo $priceOrder; ?></b><br>
			Date : <i><?php echo $dateOrder; ?></i>
	</div>
</div>