<?php 
	$dataProduct = $this->session->userdata('productListSessionPSys');
	$typeUser = $this->session->userdata('userTypeSessionPSys');
?>
	<h2 class="title"><span class="fa fa-th"></span> PRODUCT</h2>
	<hr>


	<?php if ($dataProduct == false): ?>
		<td colspan="5">Data Product Empty...</td>
	<?php endif ?>
	<?php if ($dataProduct != false): ?>
		<?php foreach ($dataProduct->result() as $product): ?>

			<?php 
				$idProduct = $product->id_product; 
				$nameProduct = $product->name_product; 
				$priceProduct = $product->price_product;
			?>
			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="thumbnail col-md-12 col-sm-12 col-xs-12 col-lg-12">
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<h2><?php echo $nameProduct; ?></h2>
						
						<label class="label label-info pull-right">Rp. <?php echo $priceProduct; ?></label>
						<hr>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
						<a class="btn btn-xs btn-primary col-md-12 col-sm-12 col-xs-12 col-lg-12" href="">
							<span class="fa fa-eye"></span>
						</a>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
						<a class="btn btn-xs btn-success col-md-12 col-sm-12 col-xs-12 col-lg-12" href="<?php echo base_url().'order/push/'.$idProduct.'/'.$priceProduct; ?>">
							<span class="fa fa-shopping-cart"></span>
						</a>								
					</div>
					
				</div>
			</div>

		<?php endforeach ?>
	<?php endif ?>