<?php include('connect.php'); ?>

<?php function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version = "";
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    } elseif (preg_match('/Firefox/i', $u_agent)) {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    } elseif (preg_match('/Chrome/i', $u_agent)) {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    } elseif (preg_match('/Safari/i', $u_agent)) {
        $bname = 'Apple Safari';
        $ub = "Safari";
    } elseif (preg_match('/Opera/i', $u_agent)) {
        $bname = 'Opera';
        $ub = "Opera";
    } elseif (preg_match('/Netscape/i', $u_agent)) {
        $bname = 'Netscape';
        $ub = "Netscape";
    } else {
    }
    if (isset($_POST['login'])) {
        include('connect.php');
        $stmt = $conn->prepare("SELECT * FROM cja_user     
        WHERE user_id = ? AND user_password = ? ");
        $stmt->bind_param("ss", $user_id, $user_password);
        $user_id = $_POST['user_id'];
        $user_password = $_POST['user_password'];
        $stmt->execute();
        if ($stmt->fetch()) {
            include('connect.php');
            $sql = "SELECT * FROM cja_user us
            LEFT JOIN cja_title ti ON us.user_title = ti.title_id
            LEFT JOIN cja_userstatus st ON us.user_status  = st.userstatus_id 
            WHERE us.user_id='$user_id' AND us.user_password='$user_password' AND us.user_status ='100' 
            or us.user_id='$user_id' AND us.user_password='$user_password' AND us.user_status ='101' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {

                $_SESSION["user_id"] = $row["user_id"];
                $_SESSION["user_password"] = $row["user_password"];
                $_SESSION["title_name"] = $row["title_name"];
                $_SESSION["user_name"] = $row["user_name"];
                $_SESSION["user_lastname"] = $row["user_lastname"];
                $_SESSION["status_name"] = $row["status_name"];
                $_SESSION["user_status"] = $row["user_status"];
                $_SESSION["userstatus_name"] = $row["userstatus_name"];

                echo '
                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
                echo '<script>
                               setTimeout(function() {
                                swal({
                                    title: "เข้าสู่ระบบสำเร็จ!",
                                    text: "ระบบกำลังนำท่านเข้าสู่เว็บไซต์.",
                                    type: "success",
                                    timer: 1000,
                                    showConfirmButton: false
                                }, function() {
                                    window.location = "../";
                                });
                              }, 1000);
                          </script>';
            } else {
                echo "<script>";
                echo "alert('ท่านระบุ user_id หรือ password ผิด!!! กรุณากรอกให้ถูกต้อง');";
                echo "window.history.back();";
                echo "</script>";
            }
        } else {
            echo "<script>";
            echo "alert('ท่านระบุ user_id หรือ password ผิด!!! กรุณากรอกให้ถูกต้อง');";
            echo "window.history.back();";
            echo "</script>";
        }
    }
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
    }
    $i = count($matches['browser']);
    if ($i != 1) {
        if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
            $version = $matches['version'][0];
        } else {
            $version = $matches['version'][1];
        }
    } else {
        $version = $matches['version'][0];
    }
    if ($version == null || $version == "") {
        $version = "?";
    }
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}
$ua = getBrowser();
$yourbrowser = "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " . $ua['platform'] . " reports: <br >" . $ua['userAgent'];
//print_r($yourbrowser);
?>
<?php
