<?php 
	$dataProduct = $this->session->userdata('productListSessionPSys');
	$typeUser = $this->session->userdata('userTypeSessionPSys');
?>

<div class="thumbnail col-md-12 col-lg-12 col-sm-12 col-xs-12">

	<h2 class="title"><span class="fa fa-th"></span> PRODUCT</h2>
	<hr>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name Product</th>
				<th>Price Product</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($dataProduct == false): ?>
				<td colspan="5">Data Order Empty...</td>
			<?php endif ?>
			<?php if ($dataProduct != false): ?>
				<?php foreach ($dataProduct->result() as $product): ?>
				<tr>			
					
					<?php 
						$idProduct = $product->id_product; 
						$nameProduct = $product->name_product; 
						$priceProduct = $product->price_product;
					?>
					
					<td><?php echo $nameProduct; ?></td>
					<td><?php echo $priceProduct; ?></td>
					<td>
						<?php if ($typeUser == 'admin'): ?>
							<a class="btn btn-xs btn-primary" href="">
								<span class="fa fa-eye"></span>
							</a>
							<a class="btn btn-xs btn-success" href="">
								<span class="fa fa-edit"></span>
							</a>
							<a class="btn btn-xs btn-danger" href="">
								<span class="fa fa-trash"></span>
							</a>
						<?php endif ?>

						<?php if ($typeUser == 'user'): ?>
							<a class="btn btn-xs btn-primary" href="">
								<span class="fa fa-eye"></span>
							</a>
							<a class="btn btn-xs btn-success" href="<?php echo base_url().'order/push/'.$idProduct.'/'.$priceProduct; ?>">
								<span class="fa fa-shopping-cart"></span>
							</a>
						<?php endif ?>

					</td>
				</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>

</div>