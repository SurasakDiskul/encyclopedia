

<?php session_start();
    require_once('./php/connect.php'); //เรียกใช้ Database
    if (isset($_POST['submit'])) {//Check if isset ว่าได้มีการกดปุ่ม submit หรือเปล่าถ้ากดให้ทำงานต่อไป
        echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    $date1 = date("Ymd_His");
    $finish = date("Ymd");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $doc_file = (isset($_POST['forum_img']) ? $_POST['forum_img'] : '');
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
    if(move_uploaded_file($_FILES['forum_img']['tmp_name'],$path_copy)){
        //ประกาศตัวแปร และ ใช้คำสั่งในการเพิ่มข้อมูลลง Table ใน Database
        $sql = "INSERT INTO `tbforum`(`title` , `remark`, `date`, `img`, `catename`) 
        VALUES (
                    '".$_POST['title']."',
                    '".$_POST['remark']."', 
                    '".$finish."', 
                    '".$newname."', 
                    '".$_POST['catename']."'
                    )";
                    if (mysqli_query($conn, $sql)) { // if check ว่า insert ข้อมูลสำเร็จหรือไม่
                        echo '<script>
                            setTimeout(function() {
                            swal({
                                title: "เพิ่มข้อมูลสำเร็จ!",
                                text: "ระบบได้เพิ่มข้อมูลให้ท่านแล้ว.",
                                type: "success",
                                timer: 2000,
                                showConfirmButton: false
                            }, function() {
                                window.location = "./index.php"; //หน้าที่ต้องการให้กระโดดไป
                            });
                            }, 1000);
                        </script>';
                    } else {  //ถ้าไม่สำเร็จให้แสดงหน้า ERROR
                        echo '<script>
                        setTimeout(function() {
                        swal({
                            title: "เพิ่มข้อมูลไม่สำเร็จ!",
                            text: "กรุณาตรวจสอบอีกครั้ง.",
                            type: "warning",
                            showConfirmButton: true
                        }, function() {
                            window.location = "./index.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                        }, 1000);
                        </script>';}
    }
}
    }
    mysqli_close($conn);
?>