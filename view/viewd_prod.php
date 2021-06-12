<section>
    <div class="content pa">
        <div class="left-siderbar ht660">
            <p style="color: #1ba085; font-size: 16px">Xin chào <?= $_SESSION['user'] ?> <i style="font-size: 16px;" class="far fa-smile-wink"></i></p>
            <span style="font-size: 16px">Quản lý tài khoản</span>
            <ul>
                <li><a href="index.php?act=user">thông tin cá nhân</a></li>
            </ul>
        </div>
        <div class="right-siderbar">            
            <div class="od" style="clear: both; padding-top: 20px;">
                <p style="font-size: 20px;">Sản phẩm đã xem</p>
                <table style="width:100%;text-align: left;">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên</th>
                        <th>Ngày xem</th>
                        <th></th>
                    </tr>
                <?php 
                    if(count($products) > 0) {
                        foreach($products as $product) {
                            echo '<tr>
                            <td><img style="width: 50px; height:50px; object-fit: cover;" src="'.$path_img.''.$product['image'].'"></td>
                            <td>'.$product['name'].'</td>
                            <td>'.$product['date'].'</td>
                            <td><a href="?act=detailProduct&id='.$product['product_id'].'">Xem sách</a></td>
                        </tr>';
                        }
                    }
                    else {
                        echo '<td style=""><h3>Bạn chưa xem sản phẩm nào</h3></td>';
                    }
                    ?>
                </table>;
            </div>
        </div>
    </div>
</section>