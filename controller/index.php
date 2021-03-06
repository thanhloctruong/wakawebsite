<?php
    session_start();
    // cookies
    if(count($_COOKIE) > 1) {
        setcookie('user', $_COOKIE['user'], time() + (86400 * 10), '/');
        setcookie('id', $_COOKIE['id'], time() + (86400 * 10), '/');
        $_SESSION['id'] = $_COOKIE['id'];
        $_SESSION['user'] = $_COOKIE['user'];
    };
    include "../model/connect.php";
    include "../model/catalog.php";
    include "../model/product.php";
    include "../model/exercise.php";
    include "../model/user.php";
    include "../model/docs.php";
    include "../model/author.php";
    include "../model/order.php";
    include "../model/comment.php";
    include "../view/global.php"; 
    include "../view/header.php";
    $catalog = showcatalog(0,0,17);
    $catalog2 = showcatalog(1,0,6);
    $catalog3 = showcatalog(0,1,6);

    $prohots=showproduct(1,0,0,0,6);
    $pronews=showproduct(0,0,0,0,6);
    $new=showproduct(0,1,0,0,6);
    $bestseller=showproduct(0,0,1,0,6);

    //search


    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'search':
                if(isset($_POST['keyword']) && ($_POST['keyword']!='')){
                    $listsearch = showsearch($_POST['keyword']);
                    include '../view/search.php';
                }
                break;
            
            case 'product':
                if(isset($_GET['idcatalog']) && ($_GET['idcatalog']>0)){
                    $idcatalog=$_GET['idcatalog'];
                }else{
                    $idcatalog=0;
                }
                $catalog = showtilte($idcatalog);
                $products=showproduct(0,0,0,$idcatalog,20);
                $authors = get_all_author();

                include "../view/product.php";
                break;
            case 'docs':
                $docs = showDocs();
                include "../view/docs.php";
                break;
            case 'login':
                if (isset($_POST['login']) && ($_POST['login'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    if (finduser($user) != NULL) {
                        $pass_hash = getPassHash($user)['pass'];
                        if (password_verify($pass, $pass_hash)) {
                            $user1 = finduser($user);
                            $_SESSION['id'] = $user1['id'];
                            $_SESSION['user'] = $user1['user'];
                            if ($user1['role'] == 1){
                                $_SESSION['admin'] = $user;
                                header('location: ../admin/index.php');
                            }else if ($user1['role'] == 2){
                                $_SESSION['teacher'] = $user;
                                header('location: ../teacher/index.php');
                            }
                            else{
                                setcookie('user', $_SESSION['user'], time() + (86400 * 10), '/');
                                setcookie('id', $_SESSION['id'], time() + (86400 * 10), '/');
                                header('location: index.php');
                            }
                        }
                        else $txt_err_lg = "sai mat khau";
                    }
                    else $txt_err_lg = "tai khoan khong ton tai";
                }
                include "../view/login.php";
                break;
            case 'user':
                $user = get_user_by_id($_SESSION['id']);
                $orders = get_limit_orders($_SESSION['id'], 5);
                include "../view/user.php";
                break;
            case 'edit_pass':
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    $user = $_SESSION['user'];
                    $pass = $_POST['password'];
                    $newpass = $_POST['newpass'];
                    $pass_hash = password_hash($newpass, PASSWORD_BCRYPT);
                    updatepass($user, $pass_hash);
                    header('location: index.php?act=user');
                }
                include "../view/edit_pass.php";
                break;
            case 'edit_user':
                // l???y th??ng tin user
                $user = get_user_by_id($_SESSION['id']);
                if(isset($_POST['btnUpdate'])) {
                    // ?????c th??ng tin m???i t??? Form ????? update
                    $user_id = $_SESSION['id'];
                    $new_address = $_POST['address'];
                    $new_email = $_POST['email'];
                    $new_phone = $_POST['tel'];
                    $new_date = $_POST['date'];
                    $new_name = $_POST['name'];
                    // update th??ng tin user
                    $update_info = ['name'=>$new_name, 'address'=>$new_address, 'phone'=>$new_phone, 'dob'=>$new_date, 'email'=>$new_email];
                    $result = update_user_by_id($update_info, $user_id);
                    if ($result) {
                        header('location: index.php?act=user'); 
                    } 
                    else {
                        include "../view/edit_user.php";
                    }
                }
                include "../view/edit_user.php";
                break;
            case 'logout':
                if(isset($_SESSION['id'])) unset($_SESSION['id']);
                if(isset($_SESSION['user'])) unset($_SESSION['user']);
                setcookie('user', '', time() - 1, '/');
                setcookie('id', '', time() - 1, '/');
                header('location: index.php');
                break;
            case 'register':
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    if (finduser($user) == NULL) {
                        $pass_hash = password_hash($pass, PASSWORD_BCRYPT);
                        $role = 0;
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $id = adduser($user, $pass_hash, $role, $name, $email);
                        header('location: index.php?act=login');
                    } else {
                        $txt_err_user = "tai khoan da ton tai";
                        include_once "../view/register.php";
                    }
                }
                include_once "../view/register.php";
                break;
            case 'checkout':
                include "../view/checkout.php";
                break;
            case 'news':
                include "../view/news.php";
                break;
            case 'learn':
                if(isset($_GET['id'])&&($_GET['id']>0))
                {        
                        $id_product = $_GET['id'];
                        $comments = get_comment_by_product_id($id_product);
                        $detailPro = getProductDetail($id_product);
                        include "../view/learn.php";
                }
                break;
            case 'doexercise':
                $exercise = showexercise();
                include "../view/doexercise.php";
                break;
            case 'contact':
                include "../view/contact.php";
                break;
            case 'viewed':
                $id = $_SESSION['id'];
                $products = get_viewed_products($id);
                include "../view/viewd_prod.php";
                break;
            case 'del_order':
                if(isset($_GET['id']) & !empty($_GET['id'])) {
                    edit_order($_GET['id']);
                }
                $orders = get_del_orders($_SESSION['id']);
                include "../view/del_order.php";
                break;
            case 'detail_order':
                if(isset($_GET['id'])) {
                    $products = get_order_detail($_GET['id']);
                }
                include "../view/detail_order.php";
                break;
            case 'detailProduct':
                if(isset($_GET['id'])&&($_GET['id']>0)){        
                    $id_product = $_GET['id'];
                    // th??m s???n ph???m ???? xem
                    if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                        $id_user = $_SESSION['id'];
                        $products = get_viewed_products($id_user);
                        if(count($products) > 0) {
                            $added = false;
                            foreach($products as $product) {
                                if($id_product == $product['product_id']) {
                                    edit_viewed_products($id_user, $id_product);
                                    $added = true;
                                }
                            }
                            if(!$added)
                                set_viewed_products($id_user, $id_product);
                        }
                        else {
                            set_viewed_products($id_user, $id_product);
                        }
                    }
                    $comments = get_comment_by_product_id($id_product);
                    $detailPro = getProductDetail($id_product);
                    include "../view/detailProduct.php";
                }else{
                    include "../view/home.php";
                } 
                break;
            default:
                $listProductById = countProductByID();
                include "../view/home.php";
        }
    }else{
        $listProductById = countProductByID();
        include "../view/home.php";
    }

    include "../view/footer.php";
?>