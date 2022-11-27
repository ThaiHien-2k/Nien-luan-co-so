<?php
session_start();

include_once 'include/config.php';
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
$oid=intval($_GET['oid']);
if(isset($_POST['submit2'])){
$status=$_POST['status'];
$sql=mysqli_query($con,"update orders set orderStatus='$status' where id='$oid'");
echo "<script>alert('Đã cập nhật trạng thái thành công!');</script>";
}

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cập nhật trang thái hóa đơn</title>
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="" style="padding-left:0px;"><div class=""><h1><b>Cập nhật tình trạng đơn hàng !</b></h1> </div></td>
      
    </tr>
    <tr height="10">
      <td  class="">Mã đơn:  <strong> <?php echo $oid;?></strong></td>
    </tr>
   
   <?php 

   $rt = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
   while($num=mysqli_fetch_array($rt))
   {
   $currrentSt=$num['orderStatus'];
 }
     {
      ?>
   
    <tr height="50">
      <td class="">Trạng thái:<strong>   <?php echo $currrentSt;?> </strong></td>
     
    </tr>
       <td  class=""><span class="" >
        <select name="status" class="" required="required" >
          <option value="">Chọn trạng thái</option>
          <option value="Đang đóng gói">Đang đóng gói</option>
                 <option value="Đang vận chuyển">Đang vận chuyển</option>
                  <option value="Đã giao">Đã giao</option>
                  <option value="Hủy">Hủy</option>
        </select>
        </span>
        <br>
        <br>
         <input type="submit" name="submit2"  value="Cập Nhật"   size="40" style="cursor: pointer;" /> &nbsp;&nbsp;   
      <input name="Submit2" type="submit" class="txtbox4" value="Thoát" onClick="return f2();" style="cursor: pointer;"  /></td>
      </td>
   
<?php } ?>
</table>
 </form>
</div>

</body>
</html>
<?php } ?>

     