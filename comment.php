<?php 
session_start(); 
$membername = $_SESSION['user_name'].$_SESSION['user_lastname'];
?>
<section class="mb-5">
    <div class="card bg-light">
        <div class="card-body">
            <!-- Comment form-->
            <?php
            $sql = "SELECT * FROM  tbcomment WHERE id = '$ss'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
            <!-- Single comment-->
            <div class="d-flex">
                <div class="flex-shrink-0"><img class="rounded-circle" src="./2.png" alt="logo" width="60" height="60"></div>
                <div class="ms-3">
                    <div class="fw-bold"><?php echo $row['membername'] ?></div>
                    When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                </div>
            </div>
            <hr>
            <form class="row gy-4" action="./comment_db.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="forumid" name="forumid" value="<?php echo $_GET['id'] ?>">
                <input type="hidden" id="membername" name="membername" value="<?php echo $membername ?>">
                <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                <br>
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</section>