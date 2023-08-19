<?php include('./php/add_user.php'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    "pageLength": 5, //จำนวนข้อมูลที่ให้แสดง ต่อ 1 หน้า
                    "responsive": true,
                    "searching": true, //เปิด=true ปิด=false ช่องค้นหาครอบจักรวาล
                    "lengthChange": true, //เปิด=true ปิด=false ช่องปรับขนาดการแสดงผล
                    "paging": true, // ไม่แสดงการแบ่งหน้า
                    "ordering": true, // ไม่ให้ทำการเรียงข้อมูลเมื่อคลิกที่คอลัมน์รายการได้
                    "info": true, // ไม่แสดงรายละเอียดรายการจำนวนข้อมูล
                    // "scrollY": '50vh', // ให้ขนาดความสูงมีขนาดเท่ากับ 50% ของ พื้นที่แสดงหน้าบราเซอร์
                    "scrollCollapse": true, // ให้ยืดหดการแสดงตามปริมาณรายการข้อมูลที่แสดง
                    lengthMenu: [
                        [5, 10, 25, 50, 100, -1],
                        [5, 10, 25, 50, 100, "All"],
                    ],
                });
            });      </script>
<!-- Modal table-->
<div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel"><b>เพิ่มผู้ใช้งาน</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <button class="btn btn-primary" style="float:right;" name="modal" data-bs-toggle="modal" data-bs-target="#adduser1">+ เพิ่ม</button><br><br>
                    <table class="table table-bordered " id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" width="10%">user</th>
                                <th class="text-center">ชื่อ - สกุล</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">หมายเหตุ</th>
                                <th class="text-center" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $row) {
                            ?>
                                    <tr>
                                        <td class="text-center" width="10%">
                                            <small>
                                                <?php echo $row['user_id']  ?>
                                            </small>
                                        </td>
                                        <td width="30%">
                                            <small>
                                                <?php echo $row['title_name'] . $row['user_name'] . '&nbsp;&nbsp;' . $row['user_lastname'] ?>
                                            </small>
                                        </td>
                                        <td class="text-center" width="20%">
                                            <small>
                                                <?php if ($row['user_status'] == '100') {
                                                    echo 'admin';
                                                } else {
                                                    echo 'user';
                                                } ?>
                                            </small>
                                        </td>
                                        <td class="text-center" width="15%">
                                            <small>
                                                <?php echo $row['user_note'] ?>
                                            </small>
                                        </td>
                                        <td class="text-center" width="10%">
                                            <a name="" id="" class="btn btn-danger btn-sm" role="button" href="./php/add_user.php?delete=<?php echo $row['user_id'] ?>" onclick="return confirm('คุณต้องการลบพนักงานใช่หรือไม่?')">
                                                <i aria-hidden="true"></i>ลบ
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!--Modal table-->


<!-- Modal -->
<div class="modal fade" id="adduser1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel"><b>เพิ่มผู้ใช้งาน</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row" action="./php/add_user.php" method="POST" enctype="multipart/form-data">
                    <div class="row gy-1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_id">รหัสผู้ใช้งาน</label>
                                <input type="text" class="border border-secondary form-control" value="" name="user_id" id="user_id" aria-describedby="helpId" placeholder="Ex : jatuporn.inn" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_password">รหัสผ่าน</label>
                                <input type="password" class="border border-secondary form-control" value="" name="user_password" id="user_password" aria-describedby="helpId" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="user_title">คำนำหน้าชื่อ</label>
                                <select class="border border-secondary form-control form-select" name="user_title" id="user_title">
                                    <option value="1">คุณ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="user_name">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="border border-secondary form-control" value="" name="user_name" id="user_name" aria-describedby="helpId" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="user_lastname">นามสกุล</label>
                                <input type="text" class="border border-secondary form-control" value="" name="user_lastname" id="user_lastname" aria-describedby="helpId" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label for="user_status">สถานะ</label>
                                <select class="border border-secondary form-control form-select" name="user_status" id="user_status" required>
                                    <option value="100">Admin</option>
                                    <option value="101">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 "></div><br>
                        <div class="modal-footer">
                            <button type="submit" name="insert" class="btn btn-success" onclick="return confirm('คุณต้องการกดยืนยันใช่หรือไม่?')">ตกลง</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal end-->



