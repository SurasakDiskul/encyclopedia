<?php
session_start();
include('./php/connect.php');
?>
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