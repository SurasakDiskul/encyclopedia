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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                "pageLength": 10, //จำนวนข้อมูลที่ให้แสดง ต่อ 1 หน้า
                "responsive": true,
                "searching": true, //เปิด=true ปิด=false ช่องค้นหาครอบจักรวาล
                "lengthChange": true, //เปิด=true ปิด=false ช่องปรับขนาดการแสดงผล
                "paging": true, // ไม่แสดงการแบ่งหน้า
                "ordering": false, // ไม่ให้ทำการเรียงข้อมูลเมื่อคลิกที่คอลัมน์รายการได้
                "info": true, // ไม่แสดงรายละเอียดรายการจำนวนข้อมูล
                // "scrollY": '50vh', // ให้ขนาดความสูงมีขนาดเท่ากับ 50% ของ พื้นที่แสดงหน้าบราเซอร์
                "scrollCollapse": true, // ให้ยืดหดการแสดงตามปริมาณรายการข้อมูลที่แสดง
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"],
                ],
            });
        });
    </script>
    <style>
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
    </style>

    <style type="text/css">
        div.img-resize img {
            width: 100px;
            height: auto;
        }

        div.img-resize {
            width: 100px;
            height: 60px;
            overflow: hidden;
            text-align: left;
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
    <div class="container">
        <marquee direction="left"><img src="./CJA1.gif" alt="" width="150" height="100"></marquee>
        <h2 class="text-center">Forum</h2>
        <hr>
        <!--Datatable-->
        <div class="table-bordered">
            <?php
            $sql = "SELECT *FROM tbforum ORDER by id DESC ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) : ?>
                <table id="example1" class="table table-responsive " width="100%">
                    <thead>
                        <tr class=" text-danger bg-dark">
                            <th width="5%" class="text-center">No</th>
                            <th width="10%" class="text-center">image</th>
                            <th width="20%" class="text-center">Title</th>
                            <th width="25%" class="text-center">details</th>
                            <th width="10%" class="text-center">Category</th>
                            <th width="10%" class="text-center">Date</th>
                            <th width="20%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($result as $row) { ?>
                            <tr class=" text-dark">
                                <td class="text-center"> <?php echo $i++ ?> </td>
                                <td>
                                    <div class="img-resize"><img src="./forum_img/<?php echo $row['img'] ?>" alt=""></div>
                                </td>
                                <td> <?php echo $row['title'] ?> </td>
                                <td> <?php echo $row['remark'] ?> </td>
                                <td class="text-center"> <?php echo $row['catename'] ?> </td>
                                <td class="text-center"> <?php $date = $row['date'];
                                        $date = date_create("$date");
                                        echo date_format($date, "d/m/") . $Year1 = date_format($date, "Y") + 543;
                                        ?> </td>
                                <td class="text-center">
                                    <a class="btn btn-primary text-white" href="viewforum.php?id=<?php echo $row['id'] ?>" target="_blank">View</a>
                                    <?php if ($_SESSION['user_status'] == '100') { ?>
                                        <a class="btn btn-warning" href="editforum.php?id=<?php echo $row['id'] ?>">Edit</a>
                                        <a class="btn btn-danger text-white" onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" href="delforum.php?id=<?php echo $row['id'] ?>">Delete</a>
                                    <?php } ?>
                                </td>
                            </tr>


                        <?php } ?>
                    </tbody>
                </table>
                <!--content end-->
            <?php
            else :
                echo " <hr>
                        <h1 class='text-center'>No Data Available.</h1>
                        <p class='mt-5 text-center'>ไม่มีข้อมูลในฐานข้อมูล</p>";
            endif;
            ?>
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

    <!--Script-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTABLE').DataTable({
                "pagingType": "numbers"
            })
        });
    </script>
</body>

</html>