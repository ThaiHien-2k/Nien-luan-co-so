<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and password='$password'");
	$num=mysqli_fetch_array($query);
	if($num>0){
		$extra="my-cart.php";
		$_SESSION['login']=$_POST['email'];
		$_SESSION['id']=$num['id'];
		$_SESSION['username']=$num['name'];
		$uip=$_SERVER['REMOTE_ADDR'];
		$status=1;
		$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
		$host=$_SERVER['HTTP_HOST'];
		$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
			header("location:http://$host$uri/$extra");
		exit();
	}
	else{
		$extra="login.php";
		$email=$_POST['email'];
		$uip=$_SERVER['REMOTE_ADDR'];
		$status=0;
		$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
		$host  = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
			header("location:http://$host$uri/$extra");
		$_SESSION['errmsg']="Sai email hoặc mật khẩu";
		exit();
	}
}


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

	    <title>Đăng nhập</title>

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
		
		</script>

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
				<li><a href="home.html">Home</a></li>
				<li class='active'>Đăng nhập</li>
			</ul>
		</div>
	</div>
</div>
<div class="body-content outer-top-bd">
	<div class="container">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
		
<div class="col-md-6 col-sm-6 sign-in" style="border: 1px solid black; border-radius: 5px; margin-left:25%; padding:30px">
	<h4 class="">Đăng nhập</h4>
	<p class="">Đăng nhập vào tài khoản của bạn.</p>
	<form class="register-form outer-top-xs" method="post">
	<span style="color:red;" >
<?php
echo htmlentities($_SESSION['errmsg']);
?>
<?php
echo htmlentities($_SESSION['errmsg']="");
?>
	</span>
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Địa chỉ email <span>*</span></label>
		    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Mật khẩu <span>*</span></label>
		 <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="login">Đăng nhập</button>
	</form>		
	<br>
	<div style="float:left">Bạn chưa có <a href="register.php">tài khoản?</a></div>

			
</div>


		
</div> -->
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