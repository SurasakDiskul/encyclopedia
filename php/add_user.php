<?php include('connect.php'); ?>
<?php
$sql = "SELECT * FROM cja_user us
LEFT JOIN cja_title ti ON us.user_title = ti.title_id
LEFT JOIN cja_userstatus st ON us.user_status  = st.userstatus_id
WHERE user_status = '100' or user_status = '101'";
$result = mysqli_query($conn, $sql);
?>

<!-- insert -->
<?php
if (isset($_POST['insert'])) {
    $user_id = $_POST['user_id'];
    $user_password = $_POST['user_password'];
    $user_title = $_POST['user_title'];
    $user_name = $_POST['user_name'];
    $user_lastname = $_POST['user_lastname'];
    $user_status = $_POST['user_status'];
        //บันทึกลงฐานข้อมูล
        $sql_user = "INSERT INTO `cja_user`(`user_id`, `user_password`, `user_title`, `user_name`, `user_lastname`, `user_status`) 
                                    VALUES ('$user_id','$user_password','$user_title','$user_name','$user_lastname','$user_status')";
        $result_user = mysqli_query($conn, $sql_user);
        if ($result_user) {
            echo "<script type='text/javascript'>";
            echo "alert('บันทึกข้อมูล เรียบร้อยแล้ว');";
            echo "window.location = '../'";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
        echo "alert('บันทึกข้อมูล ไม่สำเร็จ!!!');";
        echo "window.location = '../'";
        echo "</script>";
        }
    }
?>
<!-- insert -->



<?php
if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];
        //บันทึกลงฐานข้อมูล
        $sql_delete = "DELETE FROM `cja_user` WHERE `user_id`='$user_id'";
        $result_delete = mysqli_query($conn, $sql_delete);
        if ($result_delete) {
            echo "<script type='text/javascript'>";
            echo "alert('ลบข้อมูล เรียบร้อยแล้ว');";
            echo "window.location = '../'";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
        echo "alert('ลบข้อมูล ไม่สำเร็จ!!!');";
        echo "window.location = '../'";
        echo "</script>";
        }
    }
?>