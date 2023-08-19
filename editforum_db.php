<?php session_start();
    require_once('./php/connect.php'); 
    if (isset($_POST['submit'])) {
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $forum_img = (isset($_POST['forum_img']) ? $_POST['forum_img'] : '');
    $upload=$_FILES['forum_img']['name'];
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['forum_img']['name'],".");
    //มีการอัพโหลดไฟล์
    if($upload !='') {
    //โฟลเดอร์ที่เก็บไฟล์
    $path="./forum_img/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $numrand.$date1.$typefile;
    $path_copy=$path.$newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    if(move_uploaded_file($_FILES['forum_img']['tmp_name'],$path_copy))
                			//*** Delete Old File ***//	
			@unlink("./forum_img/".$_POST["file"]);
            {
    //sql insert
        $sql1 = "UPDATE `tbforum` SET 
        `title`='".$_POST['title']."',
        `remark`='".$_POST['remark']."',
        `catename`='".$_POST['catename']."',
        `forum_img`='".$newname."' 
        WHERE id = '".mysqli_real_escape_string($conn, $_POST['id'])."' ";
        if (mysqli_query($conn, $sql1)) {
            echo '<script>alert("แก้ไขข้อมูลสำเร็จ")</script>';
            header('Refresh:0; url=forum.php');
        } else {
            echo 'แก้ไขข้อมูลไม่สำเร็จ!!';
            header('Refresh:0; url=forum.php');
        }
      }
    }
    }
    
    mysqli_close($conn);
?>
