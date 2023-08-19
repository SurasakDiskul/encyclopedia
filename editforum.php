<?php
session_start();
require_once('./php/connect.php');

if (!isset($_GET['id'])) {
    header("location: ./");
    exit();
}
$ss = $_GET['id'];
$sql = "SELECT * FROM tbforum WHERE id = '$ss'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
?>

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
.p {
  font-family: 'Kanit', sans-serif;}
  .b {
  font-family: 'Kanit', sans-serif;}
  .a {
  font-family: 'Kanit', sans-serif;}
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

.font-primary {
  font-family: 'Kanit', sans-serif;}

.font-secondary {
  font-family: 'Kanit', sans-serif;}
        div#mylayout_2 {
            display: block;
            width: 100%;
            word-wrap: break-word;
        }
    </style>

    <style type="text/css">
         div.img-resize img {
            width: 400px;
            height: auto;
        }

        div.img-resize {
            width: auto;
            height: 400px;
            overflow: hidden;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include('./navbar.php'); ?>
    <marquee direction="left"><img src="./CJA1.gif" alt="" width="150" height="100"></marquee>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <form class="row gy-4" action="./editforum_db.php" method="POST" enctype="multipart/form-data">
                    <article>
                        <header class="mb-4">
                            <div class="form-group col-md-12">
                                <div class="img-resize"><img class="card-img-top" src="./forum_img/<?php echo $row['img'] ?>" alt="..." /></div>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" id="id" name="id" value="<?php echo $row["id"]; ?>">
                                <label for="title" class="form-label ">Title : ชื่อเรื่อง</label>
                                <input type="text" class="form-control " id="title" name="title" value="<?php echo $row['title'] ?>" required>
                            </div>
                            <div class="text-muted fst-italic mb-2">Posted on <?php echo $row['date'] ?> by Admin CJ-Auto</div>
                            <div class="form-group col-md-4">
                                <label for="catename" class="form-label ">Category : ประเภทของข้อมูล</label>
                                <select class="form-select form-control " id="catename" name="catename">
                                    <option value="<?php echo $row['catename'] ?>" selected="" disabled="">--ประเภทเอกสาร--</option>
                                    <?php
                                    $query1 = "select * from `tbcate`";
                                    $result1 = mysqli_query($conn, $query1);
                                    if (mysqli_num_rows($result1) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($result1)) {

                                    ?>
                                            <option value="<?php echo $row1['catename']; ?>"><?php echo $row1['catename']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4"></div>
                            <div class="form-group col-md-4"></div>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><a href="./forum_img/<?php echo $row['img'] ?>" target="_blank">
                                <a>IMG : แนบรูปภาพใหม่<input type="file" class="form-control " id="forum_img" name="forum_img" accept="image/x-png;image/gif;image/jpeg" required></a>
                            </a></figure>
                        <input type="hidden" id="file" name="file" value="<?php echo $row["img"]; ?>">
                        <!-- Post content-->
                        <section class="mb-5">
                            <div id="mylayout_2">
                                <div class="col-md-12">
                                    <label for="title" class="form-label ">Infomation : รายละเอียด</label>
                                    <textarea type="text" class="form-control " id="remark" name="remark" rows="15" required><?php echo $row['remark'] ?></textarea>
                                </div>
                            </div>
                        </section>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">บันทึก</button>
                            <a type="button" class="btn btn-dark" href="./forum.php">ย้อนกลับ</a>
                        </div>
                    </article>
                </form>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>-->
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Encyclopedia - CJ Auto</div>
                    <div class="card-body">เว็บสารานุกรมความรู้เรื่องช่วงล่างรถยนต์ รวบรวมข้อมูลคำถามที่พบบ่อย และคำตอบที่สามารถแก้ไขปัญหาได้โดยทันที</div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM tbcate";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) :
                            ?>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <?php if ($row['catename'] != '') { ?>
                                            <li><a href="category.php?catename=<?php echo $row['catename'] ?>"><?php echo $row['catename'] ?></a></li>
                                    </ul>
                                <?php } ?>
                                </div>
                            <?php endwhile; ?>

                        </div>
                    </div>
                </div>
                <!-- Side widget-->
            </div>
        </div>
    </div>
    <marquee direction="left"><img src="./CJA1.gif" alt="" width="150" height="100"></marquee>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>