<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a href="index.php"><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
            </li>

            <li >
                <a href="index.php?act=user"><i class="fa fa-users"></i>Users</a>
            </li>
            <li class="active-link">
                <a href="index.php?act=teacher"><i class="fa fa-users"></i>Giáo Viên</a>
            </li>
            <li>
                <a href="index.php?act=catalog"><i class="fa fa-book"></i>Danh mục</a>
            </li>

            <li>
                <a href="index.php?act=product"><i class="fa fa-file"></i>Bài Giảng</a>
            </li>

            <li>
                <a href="index.php?act=author"><i class="fa fa-user"></i>Tác giả</a>
            </li>

            <!-- <li>
                <a href="index.php?act=publisher"><i class="fa fa-building"></i>NXB</a>
            </li>

            <li>
                <a href="index.php?act=order"><i class="fa fa-th-list"></i>Đơn hàng</a>
            </li> -->

            <li>
                <a href="index.php?act=comment"><i class="fa fa-align-justify"></i>Comment</a>
            </li>

        </ul>
    </div>
</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cập nhật thông tin người dùng</h2>
                <hr>
            </div>
        </div>
        <div class="row pad-top">
            <form action="" method="post" enctype="multipart/form-data">
                <div style="width:100%; padding-left:20px">
                    <table id="tab">
                        <tr>
                            <input type="hidden" name="id" id="" value="<?php echo $u['id'] ?>">
                            <th>User</th>
                            <td><input type="text" name="user" id="" value="<?php echo $u['user'] ?>"></td>
                            <th>Name</th>
                            <td><input type="text" name="name" id="" value="<?php echo $u['name'] ?>"></td>
                           
                        </tr>

                        <tr>
                            <th>New Password</th>
                            <td>
                                <input type="text" name="pass" id="" value="<?php echo $u['pass'] ?>" hidden>
                                <input type="text" name="newpass" id="" value="">
                            </td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td> <input type="text" name="address" id="" value="<?php echo $u['address'] ?>"></td>
                            <th>Gender</th>
                            <td><input type="number" name="gender" id="" value="<?php echo $u['gender'] ?>"></td>
            
                        </tr>
                            
                        <tr>
                            <th>Phone</th>
                            <td><input type="number" name="phone" id="" value="<?php echo $u['phone'] ?>"></td>
                            <th>Email</th>
                            <td><input type="text" name="email" id="" value="<?php echo $u['email'] ?>"></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td> <button type="submit" name="Save" class="btn btn-success"><i class="fa fa-check" style="color:white"></i>Lưu</button></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
