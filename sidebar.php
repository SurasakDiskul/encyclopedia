<?php
session_start();
include('./php/connect.php');
?>
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
<!-- Side widgets-->
<div class="col-lg-4">
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Enter search forum..." aria-label="Enter search term..." aria-describedby="button-search" />
                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
            </div>
        </div>
    </div>
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