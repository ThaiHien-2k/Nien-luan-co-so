<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:.php');
}
else{
	if(isset($_POST['update']))
	{
		$saddress=$_POST['address'];
		$sstate=$_POST['district'];
		$scity=$_POST['province'];
		$query=mysqli_query($con,"update users set address='$saddress',district='$sstate',province='$scity' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Địa chỉ nhận hàng đã được cập nhật');</script>";
		}
	}



?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	

	    <title>Địa chỉ</title>

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
				<li class='active'>Địa chỉ</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box inner-bottom-sm">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
<div class="panel panel-default checkout-step-01">

		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>1</span>Địa chỉ nhận hàng
	        </a>
	     </h4>
    </div>

	<div id="collapseOne" class="panel-collapse collapse in">

	    <div class="panel-body">
			<div class="row">		
				<div class="col-md-12 col-sm-12 already-registered-login">

<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

					<form class="register-form" role="form" method="post">
<div class="form-group">
					    <label class="info-title" for=" Address">Địa chỉ<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="address" required="required"><?php echo $row['address'];?></textarea>
					  </div>



						<div class="form-group">
					    <label class="info-title" for="district ">Quận/Huyện <span>*</span></label>
			 <input type="text" class="form-control unicase-form-control text-input" id="district" name="district" value="<?php echo $row['district'];?>" required>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="province">Tỉnh/Thành phố <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="province" name="province" required="required" value="<?php echo $row['province'];?>" >
					  </div>



					  <button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Cập nhật</button>
					</form>
					<?php } ?>
				</div>	
			</div>			
		</div>


	</div>
</div>
					  	
					</div>
				</div>
			<?php include('includes/myaccount-sidebar.php');?>
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
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>


</body>
</html>
<?php } ?>