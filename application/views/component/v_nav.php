	<div class="navbar navbar-inverse navbar-default" role="navigation">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand">Payment System</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">

				<li ><a href="<?php echo base_url() ?>dashboard"><span class="fa fa-home"></span></a></li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cogs"></span> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						 <li><a href="#"><span class="fa fa-key"></span> Password</a></li>
						<li><a href="#"><span class="fa fa-user"></span> User</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url() ?>user/logout">Logout <span class="fa fa-sign-out pull-right"></span></a></li>
					</ul>
				</li>
			</ul>
		</div><!--/.nav-collapse -->	
	</div>
