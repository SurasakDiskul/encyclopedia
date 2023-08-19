<?php 
    require_once('./php/connect.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql="SELECT * FROM tbforum WHERE id = '".$id."'"; //คิวรี่ข้อมูลออกมา
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
		$path="./forum_img/"; //path ที่ไว้เก็บไฟล์		
		$newname =$row['img']; //ฟิวที่ใว้เก็บชื่อไฟล์ในฐานข้อมูล			 
		$file=$path.$newname;
		if (unlink($file)){  
        @unlink("./forum_img/".$_FILES["img"]["name"]);
        $sql1 = "DELETE FROM tbforum WHERE id = '".mysqli_real_escape_string($conn, $_GET['id'])."' ";
        if (mysqli_query($conn, $sql1)) {
            echo '<script>alert("ลบข้อมูลสำเร็จ!!")</script>';
                        header('Refresh:0; url=index.php');
        } else {
            echo '<script>alert("ลบข้อมูลไม่สำเร็จ!!")</script>';
                        header('Refresh:0; url=index.php');
        }
    }
}
    mysqli_close($conn);
?>