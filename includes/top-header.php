
<div class="top-bar animate-dropdown" >
	<div class="container" >
		<div class="header-top-inner">
			<div class="cnt-account" style="float:right;">
				<ul class="list-unstyled">

					<?php if(strlen($_SESSION['login']))    {   ?>
				<li><a href="my-account.php"><i class="icon fa fa-user"></i>Xin chào-<?php echo htmlentities($_SESSION['username']);?></a></li>
				<?php } ?>
					<li><a href="my-cart.php"><i class="icon fa fa-shopping-cart"></i>Giỏ hàng</a></li>
					<?php if(strlen($_SESSION['login'])==0)
			    { ?>
				<li><a href="login.php"><i class="icon fa fa-sign-in"></i>Đăng nhập</a></li>
				<li><a href="register.php"><i class="icon fa fa-sign-in"></i>Đăng ký</a></li>
				<?php }
						else{ ?>

				<li><a href="logout.php"><i class="icon fa fa-sign-out"></i>Đăng xuất</a></li>
				<?php } ?>	
				</ul>
			</div>
			
			<div class="clearfix"></div>
		</div>
	</div>
</div>