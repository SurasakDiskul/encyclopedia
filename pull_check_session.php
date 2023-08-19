<!-- ตรวจสอบ Session -->
<?php 
if (!isset($_SESSION['user_status'])) {
    echo "<script type='text/javascript'>";
    echo "window.location = 'login.php'";
    echo "</script>";
} 
?>
<!-- ตรวจสอบ Session -->