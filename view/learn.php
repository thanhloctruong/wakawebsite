<?php 
    $idcatalog=$detailPro['id_catalog'];
    $namecatalog=getname("catalog",$idcatalog);
    $image = $detailPro['image'];
 ?>

<?php 
 $video = getVideo($_GET['id']);
//  $count = countcourses($id_product);
 ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=633886054140033&autoLogAppEvents=1" nonce="aL0Qdd1Q">
</script>
<div class="content3">
    <div class="wrap-content3">
        <div class="left-wrap-cnt">
            <div class="top-left-wr">
                <div class="txt-detail">
                    <?php foreach ($video as $value)
                    ?>
                  <iframe width="500" height="315" src="https://www.youtube.com/embed/<?= $value ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="else-courses">
                    
                <?php 
                   for($i=1; $i < 12 ;$i++) {
                        echo ('<input value="'.$i.'" type="submit"><a href="?act=learn"></input>');
                    }
                    ?>
                </div>
            </div>
            
            <div class="card-img">
                <img src="../upload/<?php echo($image) ?>">
            </div>
            
            <a href="?act=doexercise">Làm Bài Tập</a>
 
            </div>
            <div class="comment" id="cmt-section">
                <div class="title-cmt" id="title-cmt">BÌNH LUẬN</div>
                <!-- <div class="wrap-cmt">
                    <div class="name">
                        <i class="fas fa-user"></i>Truong Thanh Loc
                        <span class="date">11/03/2021 12:29</span>
                    </div>
                    <div class="text">Sản phẩm này quá tốt</div>
                </div> -->
                <?php foreach($comments as $comment): ?>
                <div class="wrap-cmt" data-id="<?= $comment['id'] ?>">
                    <div class="name">
                        <i class="fas fa-user"></i><?= $comment['name'] ?> |
                        <span class="date"><?php $date = date_create($comment['date']); echo date_format($date, "d/m/Y H:i"); ?></span>
                    </div>
                    <div class="text"><?= $comment['content'] ?></div>
                    <?php 
                        $user_id = $_SESSION['id'] ?? '';
                        if($comment['user_id'] == $user_id): ?>
                    <div class="edit">
                        <a href="" class="del" data-id="<?= $comment['id'] ?>">Xóa</a>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
                <!-- Chặn cmt nếu chưa login -->
                <?php if(isset($_SESSION['id'])): ?>
                    <div class="wrap-cmt">
                        <div class="name">
                            <i class="fas fa-user"></i><?= $_SESSION['user'] ?>
                        </div>
                        <form action="javascript:void(0)">
                            <textarea name="" id="comment" placeholder="Nhập bình luận của bạn tại đây..."></textarea>
                            <input type="submit" id="cmt-sub" name="submit" value="Gửi">
                        </form>
                    </div>
                <?php 
                    else:
                        echo '<a href="?act=login">Đăng nhập để được bình luận</a>';
                    endif; ?>
                <script>
                    //  hàm tạo comment
                    $('#cmt-sub').click(function() {
                        let cmt = $("#comment").val();
                        let userId = <?= $_SESSION['id'] ?? '' ?>;
                        let productId = <?= $_GET['id'] ?>;
                        let cmtInfo = {
                            userId,
                            productId,
                            content : cmt
                        };
                        let cmtInfoJSON = JSON.stringify(cmtInfo);
                        $.ajax({
                            method: "POST",
                            dataType: "json",
                            url: "../model/ajax/set_cmt.php",
                            data: {data: cmtInfoJSON},
                            success: function(data) {
                                $("#comment").val('');
                                $("#title-cmt").after(`<div class="wrap-cmt" data-id=${data.id}>
                                    <div class="name">
                                        <i class="fas fa-user"></i>${data.name} |
                                        <span class="date">${data.date}</span>
                                    </div>
                                    <div class="text">${data.content}</div>
                                    <div class="edit">
                                        <a href="" class="del" data-id="${data.id}">Xóa</a>
                                    </div>
                                </div>`);
                            },
                            error: function(e) {
                                console.log(e.message);
                            }
                        });
                    });
                    // hàm xóa comment
                    $(document).on('click', '.del', function(e) {
                        e.preventDefault();
                        let id = $(this).data("id");
                        $.get(`../model/ajax/del_cmt.php?id=${id}`).done(function(data) {
                            let response = JSON.parse(data);
                            if(response.result) {
                                $('.wrap-cmt').each(function() {
                                    if($(this).data('id') == response.cmt_id)
                                        $(this).remove();
                                });
                            }
                            else
                                alert("đã có lỗi xảy ra vui lòng thử lại!")
                        })
                    });
                </script>
            </div>
        </div>
        <div class="right-wrap-cnt">
            <h1>liên quan</h1>
            <div class="list-img">
                <div class="box-img">
                    <a href="?detailProduct&id=13">
                        <img src="../view/img/img13.jpg" alt="">
                    </a>
                </div>
                <div class="box-img">
                    <a href="?detailProduct&id=14">
                        <img src="../view/img/img14.jpg" alt="">
                    </a>
                </div>
                <div class="box-img">
                    <a href="?detailProduct&id=1">
                        <img src="../view/img/img1.jpg" alt="">
                    </a>
                </div>
                <div class="box-img">
                    <a href="?detailProduct&id=2">
                        <img src="../view/img/img2.jpg" alt="">
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-----------------mới nhất---------------->
<section class="new-week">
    <div class="product">
        <p>bạn có thể thích</p>
    </div>

    <div class="row">
        <?php
            foreach ($bestseller as $product) {
                $name=$product['name'];
                $img=$path_img.$product['image'];

                $idauthor=$product['id_author'];
                $author=getname("author",$idauthor);

                if(!is_file($img)){
                    $img=$filedefault;
                }
                $view=$product['view'];
                if($view>0){
                    $view.=" lượt xem";
                }else{
                    $view=" mới cập nhật";
                }
                $link="index.php?act=detailProduct&id=".$product['id'];
                echo '
                        <div class="card-book">
                            <div>
                                <a href="'.$link.'"><img src="'.$img.'" alt=""></a>
                                <div class="txt">
                                    <p class="name"><a href="'.$link.'">'.$name.'</a></p>
                                    <p class="author"><a href="">'.$author['name'].'</a></p>
                                    <p class="view">'.$view.'</p>
                                </div>
                            </div>
                        </div>
                    ';
            }
        ?>
    </div>
</section>


