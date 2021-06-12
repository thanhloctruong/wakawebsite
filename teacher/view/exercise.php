<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a href="index.php"><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
            </li>

            <li class="active-link">
                <a href="index.php?act=product"><i class="fa fa-file"></i>Bài giảng</a>
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
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Danh sách bài tập</h2>
                <hr />
            </div>
        </div>


        <div class=" pad">
            <a href="index.php?act=exercise_add"><button type="button" class="btn btn-success"><i class="fa fa-plus" style="color:white"></i> them bai tap</button></a>
            <table id="tab_pro">
                <thead style="background-color: rgba(0, 0, 0, 0.3);">
                    <tr>
                        <!-- <th  >ID</th>
                        <th  >Catalog</th> -->
                        <th class="name">tên</th>
                        <th>câu hỏi</th>
                        <th>đáp án</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($exercises as $e) {
                        echo '
                        <tr>
                                            
                            <td class="name">'.$e['name'].'</td>                                  
                            <td><div id="detail">'.$e['question'].'</div></td>
                            <td>'.$e['answer'].'</td>
                            <td style="width:90px;"><a href="index.php?act=exercise_del&eid='.$e['id'].'"><i class="fa fa-eraser" style="font-size:24px"></i></a> | <a href="index.php?act=exercise_edit&eid='.$e['id'].'"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                        </tr>
                            ';
                        }
                    ?>

                </tbody>
            </table>

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>