<?php
session_start();
include('./php/connect.php');
?>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="./index.php"><img src="./2.png" alt="logo" width="85" height="55"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="forum.php">Forum</a></li>
                <li class="nav-item">
                    <?php if($_SESSION['user_status']=='100'){ ?>
                <div class="dropdown">
                <a class="nav-link dropdown-toggle text-gray" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Add
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" name="modal" data-bs-toggle="modal" data-bs-target="#addforum">Add Forum</a></li>
                    <li><a class="dropdown-item" name="modal" data-bs-toggle="modal" data-bs-target="#addcate">Add Categories</a></li>
                    <li><a class="dropdown-item" name="modal" data-bs-toggle="modal" data-bs-target="#adduser">Add Member</a></li>
                </ul>
                </div>
                <?php }?>
                </li>
                <li class="nav-item"><a class="nav-link"><?php echo $_SESSION['title_name'] . $_SESSION['user_name'] . '  ' . $_SESSION['user_lastname'] ?></a></li>
                <li class="nav-item"><a class="text-danger nav-link active" aria-current="page" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่?')" href="./logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
