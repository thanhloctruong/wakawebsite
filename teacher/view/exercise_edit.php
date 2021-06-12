<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a href="index.php"><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
            </li>
<!-- 
            <li>
                <a href="index.php?act=user"><i class="fa fa-users"></i>Users</a>
            </li>

            <li>
                <a href="index.php?act=catalog"><i class="fa fa-book"></i>Danh mục</a>
            </li> -->

            <li class="active-link">
                <a href="index.php?act=product"><i class="fa fa-file"></i>Bài Giảng</a>
            </li>
            <li class="active-link">
                <a href="index.php?act=exercise"><i class="fa fa-th-list"></i>Bài Tập</a>
            </li>
<!-- 
            <li>
                <a href="index.php?act=author"><i class="fa fa-user"></i>Tác giả</a>
            </li>

            <li>
                <a href="index.php?act=publisher"><i class="fa fa-building"></i>NXB</a>
            </li>

            <li>
                <a href="index.php?act=order"><i class="fa fa-th-list"></i>Đơn hàng</a>
            </li>

            <li>
                <a href="index.php?act=comment"><i class="fa fa-align-justify"></i>Comment</a>
            </li> -->

        </ul>
    </div>
</nav>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cập nhật Câu hỏi</h2>
                <hr>
            </div>
        </div>


        <div class="row  pad-top">
            <form action="" method="post" enctype="multipart/form-data">
                <div style="width:100%; padding-left:20px">
                    <table id="tab">
                    
                    <tr>
                            <th>id lớp</th>
                            <td><input type="number" name="id" id="" value="<?php echo $e['id'] ?>" required></td>
                            <th>Lớp</th>
                            <td><input type="text" name="name" id="" value="<?php echo $e['name'] ?>"></td>
                        </tr>
                        <tr >
                        
                            <th>câu hỏi</th>
                            <td colspan="4"><textarea name="question" id="" cols="60" rows="5" value="<?php echo $e['question'] ?>"></textarea></td>
                            <th>Đáp án đúng </th>
                            <td><input type="text" name="answer" id="" value="<?php echo $e['answer'] ?>"required></td>
                        </tr>
                        <tr>
                            <th>đáp án A</th>
                            <td><input type="text" name="CA" id="" value="<?php echo $e['CA'] ?>" required></td>
                            <th>Đáp án B</th>
                            <td><input type="text" name="CB" id="" value="<?php echo $e['CB'] ?>" required></td>
                        </tr>
                        <tr>
                            <th>Đáp án C</th>
                            <td><input type="text" name="CC" id="" value="<?php echo $e['CC'] ?>"required></td>
                            <th>Đáp án D</th>
                            <td><input type="text" name="CD" id="" value="<?php echo $e['CD'] ?>"required></td>
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
