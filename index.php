<?php
session_start();
include('./php/connect.php');
include('pull_check_session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Encyclopedia - CJ Auto</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./2.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/r-2.4.0/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/r-2.4.0/datatables.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap');
body {
  line-height: 1.8;
  font-family: 'Kanit', sans-serif;
    -webkit-font-smoothing: antialiased;
  font-size: 16px;
  color: rgba(0, 0, 0, 0.6);
}

h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {
  font-family: 'Kanit', sans-serif;
    font-weight: 700;
  color: #232323;
  letter-spacing: 0.5px;
}

h1, .h1 {
  font-size: 48px;
  text-transform: uppercase;
}

h2, .h2 {
  font-size: 38px;
  text-transform: uppercase;
}

h3, .h3 {
  font-size: 28px;
  line-height: 38px;
  text-transform: uppercase;
}

h4, .h4 {
  font-size: 22px;
  line-height: 30px;
}

h5, .h5 {
  font-size: 18px;
  line-height: 24px;
}

h6, .h6 {
  font-size: 16px;
  text-transform: uppercase;
  font-weight: 400;
}
.p {
  font-family: 'Kanit', sans-serif;}
  .b {
  font-family: 'Kanit', sans-serif;}
  .a {
  font-family: 'Kanit', sans-serif;}
.font-primary {
  font-family: 'Kanit', sans-serif;}

.font-secondary {
  font-family: 'Kanit', sans-serif;}
        header {
            background-image: url("./CJ333GARAGE.jpg");
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            -o-background-size: 100% 100%, auto;
            -moz-background-size: 100% 100%, auto;
            -webkit-background-size: 100% 100%, auto;
            background-size: 100% 100%, auto;
        }

        p.card-text {
            font-family: 'Kanit', sans-serif;
            white-space: nowrap;
            width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    <style type="text/css">
        div.img-resize img {
            width: 854px;
            height: auto;
        }

        div.img-resize {
            width: auto;
            height: 300px;
            overflow: hidden;
            text-align: center;
        }

        div.img-resize1 img {
            width: 500;
            height: auto;
        }

        div.img-resize1 {
            width: auto;
            height: 200px;
            overflow: hidden;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include('./navbar.php'); ?>
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
        <marquee direction="left"></marquee>
    </header>
    <!-- Page content-->
    <marquee direction="left"><img src="./CJA1.gif" alt="" width="150" height="100"></marquee>
    <div class="container">
        <?php
        $sql = "SELECT * FROM tbforum order by id DESC Limit 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="row">
            <!-- Blog entries-->
            <h5>Recently Added</h5>
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <?php if ($row['img'] != '') { ?>
                    <div class="card mb-4">
                        <a href="viewforum.php?id=<?php echo $row['id'] ?>">
                            <div class="img-resize"><img class="card-img-top " src="./forum_img/<?php echo $row['img'] ?>" alt="..." /></div>
                        </a>
                        <div class="card-body">
                            <div class="small text-muted"><?php $date = $row['date'];
                                                            $date = date_create("$date");
                                                            echo date_format($date, "d/m/") . $Year1 = date_format($date, "Y") + 543; ?></div>
                            <h2 class="card-title"><?php echo $row['title'] ?></h2>
                            <p class="card-text"><?php echo $row['remark'] ?></p>
                            <a class="btn btn-primary" href="viewforum.php?id=<?php echo $row['id'] ?>">Read more →</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <h1 class="text-center">No Data Available.</h1>
                    <p class="text-center">กรุณาเพิ่มข้อมูลลงระบบ</p>
                    <br>
                <?php } ?>


                <!-- Nested row for non-featured blog posts-->
                <?php
                $sql1 = "SELECT * FROM tbforum order by id DESC limit 1 OFFSET 1";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
                $sql2 = "SELECT * FROM tbforum order by id DESC limit 1 OFFSET 2";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $sql3 = "SELECT * FROM tbforum order by id DESC limit 1 OFFSET 3";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                $sql4 = "SELECT * FROM tbforum order by id DESC limit 1 OFFSET 4";
                $result4 = mysqli_query($conn, $sql4);
                $row4 = mysqli_fetch_assoc($result4);
                ?>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <?php if ($row1['img'] != '') { ?>
                            <div class="card mb-4">
                                <a href="viewforum.php?id=<?php echo $row1['id'] ?>">
                                    <div class="img-resize1"><img class="card-img-top" src="./forum_img/<?php echo $row1['img'] ?>" alt="..." /></div>
                                </a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php $date1 = $row1['date'];
                                                                    $date1 = date_create("$date1");
                                                                    echo date_format($date1, "d/m/") . $Year1 = date_format($date, "Y") + 543; ?></div>
                                    <h2 class="card-title h4"><?php echo $row1['title'] ?></h2>
                                    <p class="card-text"><?php echo $row1['remark'] ?></p>
                                    <a class="btn btn-primary" href="viewforum.php?id=<?php echo $row1['id'] ?>">Read more →</a>
                                </div>
                            </div>
                        <?php } else { ?>

                        <?php } ?>
                        <!-- Blog post-->
                        <?php if ($row3['img'] != '') { ?>
                            <div class="card mb-4">
                                <a href="viewforum.php?id=<?php echo $row3['id'] ?>">
                                    <div class="img-resize1"><img class="card-img-top" src="./forum_img/<?php echo $row3['img'] ?>" alt="..." /></div>
                                </a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php $date3 = $row3['date'];
                                                                    $date3 = date_create("$date3");
                                                                    echo date_format($date3, "d/m/") . $Year1 = date_format($date, "Y") + 543; ?></div>
                                    <h2 class="card-title h4"><?php echo $row3['title'] ?></h2>
                                    <p class="card-text"><?php echo $row3['remark'] ?></p>
                                    <a class="btn btn-primary" href="viewforum.php?id=<?php echo $row3['id'] ?>">Read more →</a>
                                </div>
                            </div>
                        <?php } else { ?>

                        <?php } ?>
                    </div>
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <?php if ($row2['img'] != '') { ?>
                            <div class="card mb-4">
                                <a href="viewforum.php?id=<?php echo $row2['id'] ?>">
                                    <div class="img-resize1"><img class="card-img-top" src="./forum_img/<?php echo $row2['img'] ?>" alt="..." /></div>
                                </a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php $date2 = $row2['date'];
                                                                    $date2 = date_create("$date2");
                                                                    echo date_format($date2, "d/m/") . $Year1 = date_format($date, "Y") + 543; ?></div>
                                    <h2 class="card-title h4"><?php echo $row2['title'] ?></h2>
                                    <p class="card-text"><?php echo $row2['remark'] ?></p>
                                    <a class="btn btn-primary" href="viewforum.php?id=<?php echo $row2['id'] ?>">Read more →</a>
                                </div>
                            </div>
                        <?php } else { ?>

                        <?php } ?>
                        <!-- Blog post-->
                        <?php if ($row4['img'] != '') { ?>
                            <div class="card mb-4">
                                <a href="viewforum.php?id=<?php echo $row4['id'] ?>">
                                    <div class="img-resize1"><img class="card-img-top" src="./forum_img/<?php echo $row4['img'] ?>" alt="..." /></div>
                                </a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php $date4 = $row4['date'];
                                                                    $date4 = date_create("$date4");
                                                                    echo date_format($date4, "d/m/") . $Year1 = date_format($date, "Y") + 543; ?></div>
                                    <h2 class="card-title h4"><?php echo $row4['title'] ?></h2>
                                    <p class="card-text"><?php echo $row4['remark'] ?></p>
                                    <a class="btn btn-primary" href="viewforum.php?id=<?php echo $row4['id'] ?>">Read more →</a>
                                </div>
                            </div>
                        <?php } else { ?>

                        <?php } ?>
                    </div>

                </div>
                <!-- Pagination-->
                <!--<nav aria-label="Pagination">
                        
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="viewforum.php?id=<?php echo $row['id'] ?>">1</a></li>
                            <li class="page-item"><a class="page-link" href="viewforum.php?id=<?php echo $row['id'] ?>">2</a></li>
                            <li class="page-item"><a class="page-link" href="viewforum.php?id=<?php echo $row['id'] ?>">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="viewforum.php?id=<?php echo $row['id'] ?>">...</a></li>
                            <li class="page-item"><a class="page-link" href="viewforum.php?id=<?php echo $row['id'] ?>">15</a></li>
                            <li class="page-item"><a class="page-link" href="viewforum.php?id=<?php echo $row['id'] ?>">Older</a></li>
                        </ul>
                    </nav>-->
                <hr class="my-0" />
                <br>
                <div class="row">
                    <div class="col-5"></div>
                    <div class="col-2">
                        <a class="btn btn-warning" href="./forum.php">View All</a>
                    </div>
                    <div class="col-5"></div>
                </div>
            </div>

            <?php include('./sidebar.php') ?>
        </div>
    </div>
    <br>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright Encyclopedia - CJ Auto &copy;2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <!-- Modal -->
    <div class="modal fade" id="addforum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Add Forum</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row gy-4" action="./addforum_db.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <br>
                            <a></a>
                            <a>Title : ชื่อเรื่อง<input type="text" class="form-control" id="title" name="title" placeholder="--Title--" required></a>
                            <div class="col-md-12">
                                <label type="hidden" for="enddate" class="form-label text-white"></label>
                            </div>
                            <a>Infomation : รายละเอียด<textarea type="text" class="form-control" id="remark" name="remark" rows="5" placeholder="--Infomation--" required></textarea></a>
                            <div class="col-md-12">
                                <label type="hidden" for="enddate" class="form-label text-white"></label>
                            </div>
                            <a>IMG : แนบรูปภาพ<input type="file" class="form-control " id="forum_img" name="forum_img" accept="image/x-png;image/gif;image/jpeg" required></a>
                            <div class="col-md-12">
                                <label type="hidden" for="enddate" class="form-label text-white"></label>
                            </div>
                            <a>Category : ประเภทของข้อมูล<select class="form-control form-select " name="catename" id="catename" required>
                                    <option value="" selected="" disabled="">--Select Category--</option>
                                    <?php
                                    $query2 = "select * from `tbcate`;";
                                    $result2 = mysqli_query($conn, $query2);
                                    if (mysqli_num_rows($result2) > 0) {
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                    ?>
                                            <option value="<?php echo $row2['catename'] ?>"><?php echo $row2['catename'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select></a>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-success" onclick="return confirm('คุณต้องการกดยืนยันใช่หรือไม่?')">ตกลง</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Modal end-->
    <!-- Modal -->
    <div class="modal fade" id="addcate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Add Categories</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row gy-4" action="./addcate_db.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <br>
                            <a></a>
                            <a>Category : ประเภทของข้อมูล<input type="text" class="form-control" id="catename" name="catename" placeholder="--Category--" required></a>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-success" onclick="return confirm('คุณต้องการกดยืนยันใช่หรือไม่?')">ตกลง</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Modal end-->
    <!-- Modal 
                <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">Add User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form class="row gy-4" action="./adduser_db.php" method="POST" enctype="multipart/form-data">                        
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-success" onclick="return confirm('คุณต้องการกดยืนยันใช่หรือไม่?')">ตกลง</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>    
                        </form>
                        </div>
                    </div>
                </div>
                </div>
                Modal end--><?php include('modal-insert.php') ?>

</body>

</html>