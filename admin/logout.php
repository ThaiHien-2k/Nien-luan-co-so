<?php
    session_start();
        $_SESSION['alogin']=="";
    session_unset();
        $_SESSION['errmsg']="Bạn đã đăng xuất thành công";
?>
<script >
    document.location="index.php";
</script>
