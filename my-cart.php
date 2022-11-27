<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			echo "<script>alert('Giỏ hàng của bạn đã được cập nhật');</script>";
			echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
		}
	}
if(isset($_POST['remove_code'])){
	if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
				unset($_SESSION['cart'][$key]);
		}
	
	}
}


if(isset($_POST['ordersubmit'])) 
{
	
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$value=array_combine($pdd,$quantity);
		foreach($value as $qty=> $val34){

mysqli_query($con,"insert into orders(userId,productId,quantity) values('".$_SESSION['id']."','$qty','$val34')");
header('location:payment-method.php');
}
}}
	if(isset($_POST['update']))
	{
		$saddress=$_POST['address'];
		$sstate=$_POST['district'];
		$scity=$_POST['province'];

		$query=mysqli_query($con,"update users set address='$saddress',district='$sstate',province='$scity' where id='".$_SESSION['id']."'");
		if($query)
		{
			echo "<script>alert('Địa chỉ giao hàng đã được cập nhật');</script>";
			echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
		
		}
	}

?>

<!DOCTYPE html>
<html lang="vn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">


	    <title>Giỏ hàng</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<link rel="stylesheet" href="assets/css/font-awesome.min.css">


		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		

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
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Giỏ hàng</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
<form name="cart" method="post">	
<?php
if(!empty($_SESSION['cart'])){
	?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-romove item">Xóa</th>
					<th class="cart-description item">Hình ảnh</th>
					<th class="cart-product-name item">Tên sản phẩm</th>
			
					<th class="cart-qty item">Số lượng</th>
					<th class="cart-sub-total item">Giá</th>

					<th class="cart-total last-item">Tổng</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Tiếp tục mua</a>
								<input type="submit" name="submit" value="Cập nhật giỏ hàng" class="btn btn-upper btn-primary pull-right outer-right-xs">
							</span>
						</div>
					</td>
				</tr>
			</tfoot>
			<tbody>
 <?php
 $pdtid=array();
    $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=0;
			$totalqunty=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;

				array_push($pdtid,$row['id']);

	?>

				<tr>
					<td class="romove-item"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" /></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>">
						    <img src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage'];?>" alt="" width="114" height="146">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" >
						<?php echo $row['productName'];$_SESSION['sid']=$pd;?></a></h4>

						
					</td>
					<td class="cart-product-quantity">
						<div class="quant-input">
				                <div class="arrows">
				                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
				                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
				                </div>
				             <input type="text" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]">
				             
			              </div>
		            </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo number_format(($row['productPrice']),-3,',')." "; ?> VNĐ</span></td>


					<td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo number_format(($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']),-3,',')." "; ?>VNĐ</span></td>
				</tr>

				<?php } }
$_SESSION['pid']=$pdtid;
				?>
				
			</tbody>
		</table>
		
	</div>
</div>
		<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Địa chỉ nhận hàng</span>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query)){?>
<div class="form-group">
					    <label class="info-title" for="address">Địa chỉ<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="address" required="required"><?php echo $row['address'];?> </textarea>
					  </div>



						<div class="form-group">
					    <label class="info-title" for="district">Quận/Huyện  <span>*</span></label>
			 <input type="text" class="form-control unicase-form-control text-input" id="district" name="district" value="<?php echo $row['district'];?>" required> 
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="province">Tỉnh/Thành phố <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="province" name="province" required="required" value="<?php echo $row['province'];?>" > 
					  </div>



					  <button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Cập nhật</button>
			
					<?php } ?>
		
						</div>
					
					</td>
				</tr>
		</tbody>
	</table>
</div>


<div class="col-md-5 col-sm-12 cart-shopping-total">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					
					<div class="cart-grand-total">
					<span style="text-align:right;">Tổng tiền: </span><span class="inner-left-md"><?php echo number_format(($totalprice),-3,',')." VNĐ"; ?></span>
					</div>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<button type="submit" name="ordersubmit" class="btn btn-primary">Thanh Toán</button>
						
						</div>
					</td>
				</tr>
		</tbody>
	</table>
	<?php } else {
echo "Giỏ hàng trống";
		}?>
</div>			</div>
		</div> 
		</form>
<?php echo include('includes/brands-slider.php');?>
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