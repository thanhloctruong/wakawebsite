<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a href="index.php"><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
            </li>

            <li>
                <a href="index.php?act=user"><i class="fa fa-users"></i>Users</a>
            </li>
            <li class="active-link">
                <a href="index.php?act=teacher"><i class="fa fa-users"></i>Giáo Viên</a>
            </li>

            <li>
                <a href="index.php?act=catalog"><i class="fa fa-book"></i>Danh mục</a>
            </li>

            <li >
                <a href="index.php?act=product"><i class="fa fa-file"></i>Bài Giảng</a>
            </li>

            <li>
                <a href="index.php?act=author"><i class="fa fa-user"></i>Tác giả</a>
            </li>
<!-- 
            <li>
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
                <h2>Thêm sản Giảng viên mới</h2>
                <hr/>
            </div>
        </div>

        <div class="row  pad-top">
            <form action="" method="post" enctype="multipart/form-data">
                <div style="width:100%; padding-left:20px">
                    <table id="tab">
                    <tr>
                            <th>id Giao vien</th>
                            <td><input type="text" name="id_teacher" id="" value="" required></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><input type="text" name="name" id="" value="" required></td>
                            <th>vai trò</th>
                            <td> <input type="text" name="role" id="" value="2"></td>
                        </tr>

                        <tr>
                            <th>số điện thoại</th>
                            <td> <input type="text" name="sdt" id="" value="" required></td>
                            <th>email</th>
                            <td><input type="text" name="email" id="" value=""  required ></td>
                        </tr>
                        
                        <tr>
                            <th>ten dang nhap</th>
                            <td> <input type="text" name="user" id="" value="" required></td>
                            <th>mat khau</th>
                            <td><input type="password" name="pass" id="" value="" required></td>
                        </tr>
                        <tr>
                            <th>giới tính</th>
                            <td><input type="number" name="gender" id="" value=""></td>
                            <th>ngày sinh</th>
                            <td><input type="text" name="birthday" id="" value="" placeholder='2000-06-04'></td>
                        </tr>

                        <tr>
                            <th>địa chỉ</th>
                            <td colspan="2"><textarea name="address" id="" cols="60" rows="3"></textarea></td>
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