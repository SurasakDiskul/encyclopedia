<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Encyclopedia - CJ Auto</title>
    <link rel="icon" type="image/x-icon" href="./2.png" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<style>
    body {
        background-image: url("./img/12.jpg");
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        -o-background-size: 100% 100%, auto;
        -moz-background-size: 100% 100%, auto;
        -webkit-background-size: 100% 100%, auto;
        background-size: 100% 100%, auto;
    }

    form {
        border: 0px solid #f1f1f1;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 2px solid #ccc;
        box-sizing: border-box;
    }

    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }
</style>

<body>
    <div class="container"><br><br>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-sm-4">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="p-3">
                                    <div class="text-center">
                                        <div class="imgcontainer">
                                            <img src="./img/img_avatar2.png" alt="Avatar" class="avatar">
                                        </div>
                                    </div>
                                    <center>
                                        <h3><b>ระบบสารานุกรม โชว์จุ่ง</b></h3>
                                    </center>
                                    <form action="./php/check_login.php" method="POST" class="user">
                                        <div class="form-group py-1">
                                            <input type="text" class="form-control form-control-user" name="user_id" aria-describedby="emailHelp" placeholder="Enter Username" required>
                                        </div>
                                        <div class="form-group py-1">
                                            <input type="password" class="form-control form-control-user" name="user_password" placeholder="Enter Password" required>
                                        </div>
                                        <div class="form-group py-1">
                                            <div class="custom-control custom-checkbox small py-1">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <center>
                                            <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                            <a href="" class="btn btn-danger btn-user btn-block">
                                                ยกเลิก
                                            </a>
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <marquee direction="left"><img src="./CJA1.gif" alt="" width="250" height="200"></marquee>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>