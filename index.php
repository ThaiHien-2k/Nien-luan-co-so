<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
		echo "<script>alert('Số lượng sản phẩm đã được cập nhật')</script>";
		echo "<script type='text/javascript'> document.location ='index.php'; </script>";
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
		
		}else{
			$message="ID sản phẩm không hợp lệ";
		}
	}
		echo "<script>alert('Sản phẩm đã được thêm vào giỏ')</script>";
		echo "<script type='text/javascript'> document.location ='index.php'; </script>";
}


?>
<!DOCTYPE html>
<html lang="vn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">


	    <title>TH Shop</title>

	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	</head>
		
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>

<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="furniture-container homepage-container">
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
	<?php include('includes/side-menu.php');?>
			</div>
			
			<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
			
<div id="hero" class="homepage-slider3">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
		<div class="full-width-slider">	
			<div class="item" style="background-image: url(assets/images/sliders/anh2.jpg);">
			</div>
		</div>
	    
	    <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(assets/images/sliders/nhot-xe-may.jpg);">
			</div>
		</div>

	</div>
</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left">SẢN PHẨM NỔI BẬT</h3>
			</div>

			<div class="tab-content outer-top-xs">
				<div class="tab-pane in active" id="all">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="5">
<?php
$ret=mysqli_query($con,"select * from products");
while ($row=mysqli_fetch_array($ret)) 
{
	
?>

						    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product" >		
		<div class="product-image text-center" >
			<div class="image"  style="margin: right 70px;">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage']);?>"  width="180" height="300" alt=""></a>
			</div>					                        		   
		</div>
		<div class="product-info text-center">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php 
			if(strlen($row['productName']) <= 29){
			echo htmlentities($row['productName'])."<br>"."<br>";} else {echo htmlentities($row['productName']);}?></a></h3>
			<div class="description"></div>
			<div class="product-price ">	
				<span class="price">
					<?php echo  number_format(($row['productPrice']),-3,',');?>đ			</span>
										     <span class="price-before-discount"><?php echo number_format(($row['productPriceBeforeDiscount']),-3,',');?>đ	</span>
									
			</div>
			
		</div>
		<?php {?>
					<center><div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Thêm vào giỏ hàng</a></div></center>
				<?php } ?>
			</div>
			</div>
		</div>
	<?php } ?>

			</div>
		</div>
	</div>
</div>

<br>
<br>
<br>
<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left">HONDA</h3>
			</div>

			<div class="tab-content outer-top-xs">
				<div class="tab-pane in active" id="all">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="5">
<?php
$ret=mysqli_query($con,"select * from products where id_category=25");
while ($row=mysqli_fetch_array($ret)) 
{
	
?>

						    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product" >		
		<div class="product-image text-center" >
			<div class="image"  style="margin: right 70px;">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage']);?>"  width="180" height="300" alt=""></a>
			</div>					                        		   
		</div>
		<div class="product-info text-center">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php 
			if(strlen($row['productName']) <= 29){
			echo htmlentities($row['productName'])."<br>"."<br>";} else {echo htmlentities($row['productName']);}?></a></h3>
			<div class="description"></div>
			<div class="product-price ">	
				<span class="price">
					<?php echo  number_format(($row['productPrice']),-3,',');?>đ			</span>
										     <span class="price-before-discount"><?php echo number_format(($row['productPriceBeforeDiscount']),-3,',');?>đ	</span>
									
			</div>
			
		</div>
		<?php {?>
					<center><div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Thêm vào giỏ hàng</a></div></center>
				<?php } ?>
			</div>
			</div>
		</div>
	<?php } ?>

			</div>
					</div>
				</div>
</div>


<br>
		<br>
		<br>
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left">SYM</h3>
			</div>

			<div class="tab-content outer-top-xs">
				<div class="tab-pane in active" id="all">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="5">
<?php
$ret=mysqli_query($con,"select * from products where id_category=26");
while ($row=mysqli_fetch_array($ret)) 
{
	
?>

						    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product" >		
		<div class="product-image text-center" >
			<div class="image"  style="margin: right 70px;">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage']);?>"  width="180" height="300" alt=""></a>
			</div>					                        		   
		</div>
		<div class="product-info text-center">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php 
			if(strlen($row['productName']) <= 29){
			echo htmlentities($row['productName'])."<br>"."<br>";} else {echo htmlentities($row['productName']);}?></a></h3>
			<div class="description"></div>
			<div class="product-price ">	
				<span class="price">
					<?php echo  number_format(($row['productPrice']),-3,',');?>đ			</span>
										     <span class="price-before-discount"><?php echo number_format(($row['productPriceBeforeDiscount']),-3,',');?>đ	</span>
									
			</div>
			
		</div>
		<?php {?>
					<center><div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Thêm vào giỏ hàng</a></div></center>
				<?php } ?>
			</div>
			</div>
		</div>
	<?php } ?>

			</div>
		</div>
	</div>
</div>


<br>
		<br>
		<br>
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left">SUZUKI</h3>
			</div>

			<div class="tab-content outer-top-xs">
				<div class="tab-pane in active" id="all">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="5">
<?php
$ret=mysqli_query($con,"select * from products where id_category=27");
while ($row=mysqli_fetch_array($ret)) 
{
	
?>

						    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product" >		
		<div class="product-image text-center" >
			<div class="image"  style="margin: right 70px;">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage']);?>"  width="180" height="300" alt=""></a>
			</div>					                        		   
		</div>
		<div class="product-info text-center">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php 
			if(strlen($row['productName']) <= 29){
			echo htmlentities($row['productName'])."<br>"."<br>";} else {echo htmlentities($row['productName']);}?></a></h3>
			<div class="description"></div>
			<div class="product-price ">	
				<span class="price">
					<?php echo  number_format(($row['productPrice']),-3,',');?>đ			</span>
										     <span class="price-before-discount"><?php echo number_format(($row['productPriceBeforeDiscount']),-3,',');?>đ	</span>
									
			</div>
			
		</div>
		<?php {?>
					<center><div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Thêm vào giỏ hàng</a></div></center>
				<?php } ?>
			</div>
			</div>
		</div>
	<?php } ?>

			</div>
		</div>
	</div>
</div>


<br>
		<br>
		<br>
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left">YAMAHA</h3>
			</div>

			<div class="tab-content outer-top-xs">
				<div class="tab-pane in active" id="all">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="5">
<?php
$ret=mysqli_query($con,"select * from products where id_category=28");
while ($row=mysqli_fetch_array($ret)) 
{
	
?>

						    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product" >		
		<div class="product-image text-center" >
			<div class="image"  style="margin: right 70px;">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage']);?>"  width="180" height="300" alt=""></a>
			</div>					                        		   
		</div>
		<div class="product-info text-center">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php 
			if(strlen($row['productName']) < 29){
			echo htmlentities($row['productName'])."<br>"."<br>";} else {echo htmlentities($row['productName']);}?></a></h3>
			<div class="description"></div>
			<div class="product-price ">	
				<span class="price">
					<?php echo  number_format(($row['productPrice']),-3,',');?>đ			</span>
										     <span class="price-before-discount"><?php echo number_format(($row['productPriceBeforeDiscount']),-3,',');?>đ	</span>
									
			</div>
			
		</div>
		<?php {?>
					<center><div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Thêm vào giỏ hàng</a></div></center>
				<?php } ?>
			</div>
			</div>
		</div>
	<?php } ?>

			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
</div>
</div>
<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>

    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</body>
</html>