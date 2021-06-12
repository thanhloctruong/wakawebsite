
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neva gone project</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../view/css/style.css">
    <script src="../view/jquery/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" href="../view/img/lg.png" type="image/x-icon">
    <script>
        $(function() {
            $("#boxuser").hide();
            $("#btnuser").click(function(e) {
                // e.preventDefault();
                $("#boxuser").show();
            });
            $("#boxuser").mouseover(function() {
                $("#boxuser").show();
            });

            $("#boxuser").mouseout(function() {
                $("#boxuser").hide();
            });
        });
    </script>
</head>
<body>
    <header>
        <div class="top-menu" id="myheader">
            <div class="logo" id="mylogo">
                <a href="index.php"><img src="../view/img/logo.png" alt="" style="width: 130px;"></a>
            </div>
            <form action="index.php?act=search" method="post">
                <input class="search" type="text" name="keyword" placeholder="Nhập tên môn học, tác giả..." required>
                <input type="submit" class="btn" name="" value="tìm kiếm">
            </form>
            <div class="wrap-login" style="">
                <?php
                    if(isset($_SESSION['id'])&&($_SESSION['id']>0)){
                        echo '
                        <div class="user" id="btnuser">
                            <i class="fas fa-user-cog"></i>
                            <span>'.$_SESSION['user'].'</span>
                            <div class="profile" id="boxuser">
                                <div class="pro">
                                    <div class="user-img">
                                        <img src="../view/img/img1.jpg" alt="">
                                    </div>
                                    <div class="user-name">
                                        <p>'.$_SESSION['user'].'</p>
                                        <a href="index.php?act=user">Xem trang cá nhân</a>
                                    </div>
                                </div>
                                <div class="feedback">
                                    <a href="">Đóng góp ý kiến</a>
                                    <p>Góp phần cải thiện website</p>
                                </div>
                                <button class="logout" ><i class="fas fa-sign-out-alt"></i><a href="index.php?act=logout"> Đăng xuất</a></button>
                            </div>
                        </div>
                        ';                        
                    }else{
                ?>
                <button class="login"><a href="index.php?act=login">đăng nhập</a></button>
                <button class="register"><a href="index.php?act=register">đăng ký</a></button>
                    <?php }
                
                ?>
            </div>
        </div>
        <div class="bot-menu">
            <li><a href="index.php">trang chủ</a></li>
            <li><a href="index.php?act=product">Bài Giảng</a></li>
            <?php if(isset($_SESSION['user'])): ?>
            <li><a href="index.php?act=docs">Tài Liệu</a></li>
            <?php else: ?>
                <a href="index.php?act=login">Tài Liệu</a>
                <?php endif?>
            <li><a href="index.php?act=contact">liên hệ</a></li>
            <li><a href="index.php?act=news">tin tức</a></li>
        </div>
    </header>
   