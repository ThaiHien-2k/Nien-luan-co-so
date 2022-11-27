<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
		echo "<script>alert('Số lượng sản phẩm đã được cập nhật')</script>";
		echo "<script type='text/javascript'> document.location ='javascript:history.go(-1)'; </script>";
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
					echo "<script>alert('Sản phẩm đã được thêm vào giỏ hàng !!')</script>";
					echo "<script type='text/javascript'> document.location ='javascript:history.go(-1)'; </script>";



		}else{
			$message="ID sản phẩm không hợp lệ";
		}
	}
}
$pid=intval($_GET['pid']);




if(isset($_POST['submit']))
{
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	
	$name=$_POST['name'];

	$review=$_POST['review'];
	mysqli_query($con,"insert into productreviews(productId,name,review) values('$pid','$name','$review')");
	echo "<script type='text/javascript'> document.location ='javascript:history.go(-1)'; </script>";
	echo "<script>alert('Đã bình luận thành công !!')</script>";
}}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

	    <title>Chi Tiết Sản Phẩm</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/config.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

		<link rel="shortcut icon" href="assets/images/favicon.ico">
	</head>
    <body class="cnt-home">
	
<header class="header-style-1">

<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
<?php
$ret=mysqli_query($con,"select category.categoryName as catname,products.productName as pname from products join category on category.id=products.id_category where products.id='$pid'");
while ($rw=mysqli_fetch_array($ret)) {

?>


			<ul class="list-inline list-unstyled">
				<li><a href="index.php">Home</a></li>
				<li><?php echo htmlentities($rw['catname']);?></a></li>
				<li class='active'><?php echo htmlentities($rw['pname']);?></li>
			</ul>
			<?php }?>
		</div>
	</div>
</div>
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product outer-bottom-sm '>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
					<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Danh mục</div>        
    <nav class="" role="">
  
        <ul class="nav">
            <li class="dropdown menu-item">
              <?php $sql=mysqli_query($con,"select id,categoryName  from category");
while($row=mysqli_fetch_array($sql))
{
    ?>
                <a href="category.php?cid=<?php echo $row['id'];?>" class="dropdown-toggle" style="">
                <?php echo $row['categoryName'];?></a>
                <?php }?>
                        
</li>
</ul>
    </nav>
</div>
				</div>
			</div>
<?php 
$ret=mysqli_query($con,"select * from products where id='$pid'");
while($row=mysqli_fetch_array($ret))
{

?>
			<div class='col-md-9'>
				<div class="row  wow fadeInUp">
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">

 <div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['productName']);?>" href="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage']);?>" width="370" height="350" />
                </a>
            </div>

        </div>
        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
            </div>
        </div>

    </div>
</div>     			




					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name"><?php echo htmlentities($row['productName']);?></h1>
<?php $rt=mysqli_query($con,"select * from productreviews where productId='$pid'");
$num=mysqli_num_rows($rt);
{
?>		
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
							
									</div>
									
								</div>
							</div>
<?php } ?>
							<div class="stock-container info-container m-t-10">
								
							</div>

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-3">
										<div class="stock-box">
											<span class="label">Hãng :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value"><?php echo htmlentities($row['productCompany']);?></span>
										</div>	
									</div>
								</div>
							</div>

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											<span class="price"><?php echo number_format(($row['productPrice']),-3,',');?> đ</span><br>
											<span class="price-strike"><?php echo number_format(($row['productPriceBeforeDiscount']),-3,',');?> đ</span>
										</div>
									</div>
								</div>
							</div>
							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">Số lượng :</span>
									</div>
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" value="1">
							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
<?php ?>
										<a href="product-details.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Thêm vào giỏ hàng</a>
													<?php ?>

					<?php  ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
								<li><a data-toggle="tab" href="#review">Đánh giá</a></li>
							</ul>
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text"><?php echo $row['productDescription'];?></p>
									</div>	
								</div>

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">Bình luận của sản phẩm</h4>
											<div class="col-sm-8">
										<div class="reviews">
											<?php echo htmlentities($num);?> Bình luận	
										</div>
									</div>
									<br>
									<br>
								<?php $qry=mysqli_query($con,"select * from productreviews where productId='$pid'");
									while($rvw=mysqli_fetch_array($qry))
								{?>

											<div class="reviews" style="border: solid 1px #000; padding-left: 2% ">
												<div class="review">
												<div class="author m-t-15">Người dùng: <span class="name"><?php echo htmlentities($rvw['name']);?></span></div>
													<div class="review-title">Đánh giá ngày: <span><?php echo (date("d/m/Y",(strtotime($rvw['reviewDate']))));?></span></span>
												</div>
													<div class="text">Nội dung: -<?php echo htmlentities($rvw['review']);?>
												</div>
												</div>
											</div>
											<?php } ?>
										</div>
										<form role="form" class="cnt-form" name="review" method="post">
											<div class="review-form">
												<div class="form-container">
													
														
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group">
																	<br>
																	<label for="exampleInputName">Họ tên</label>
																<input type="text" class="form-control txt" id="exampleInputName" placeholder="" name="name" required="required">
																</div>
															</div>
																
															<div class="col-md-12">
																<div class="form-group">
																	<label for="exampleInputReview">Bình luận: <span class="astk"></span></label>

																	<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="" name="review" required="required"></textarea>
																</div>
															</div>
														</div>
														<div class="action text-right">
															<button name="submit" class="btn btn-primary btn-upper">Gửi</button>
														</div>
													</form>
												</div>
											</div>
										</div>
							        </div>
								</div>
							</div>
						</div>
					</div>
				</div>

<?php $cid=$row['category']; } ?>

			
			</div>
			<div class="clearfix"></div>
		</div>
<?php include('includes/brands-slider.php');?>
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
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

</body>
</html>