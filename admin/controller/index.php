<?php
    session_start();
    include "../model/connect.php";
    include "../model/user.php";
    include "../model/teacher.php";
    include "../model/catalog.php";
    include "../model/product.php";
    include "../model/author.php";
    include "../model/order.php";
    include "../model/comment.php";
    include "../model/status.php";
    include "../view/global.php"; 
    include "../view/header.php";

    if (!isset($_SESSION['admin'])) {
        header('location: ../../index.php');
    } else {
        if(isset($_GET['act'])){
            $act = $_GET['act'];
            switch($act){
                
                case 'user':
                    $users=allUsers();
                    include "../view/user.php";
                    break;

                case 'user_del':
                    $id = $_GET['id'];
                    delUser($id);
                    header('location: index.php?act=user');
                    break;

                case 'user_edit':
                    $id = $_GET['id'];
                    $u = getUser($id);
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $newpass = $_POST['newpass'];
                        if ($newpass != "" && (!password_verify($newpass, $pass))) {
                            $pass = password_hash($newpass, PASSWORD_BCRYPT);
                        }
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $date = $_POST['date'];
                        $address = $_POST['address'];
                        $gender = $_POST['gender'];
                        $result = updateUser($id, $user, $name, $pass, $phone, $email, $date, $address, $gender);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("???? c???p nh???t th??ng tin ng?????i d??ng!");
                            window.location.href = "index.php?act=user";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("C???p nh???t th???t b???i!");
                            window.location.href = "index.php?act=user";
                                </script>
                            ';
                        }
                    }
                    include "../view/user_edit.php";
                    break;
                    case 'teacher_add':
                        if (isset($_POST['Save'])) {
                            $id_teacher = $_POST['id_teacher'];
                            $name = $_POST['name'];
                            $role = $_POST['role'];
                            $user = $_POST['user'];
                            $pass=$_POST['pass'];
                            $phone=$_POST['sdt'];
                            $email = $_POST['email'];
                            $gender = $_POST['gender'];
                            $birthday = $_POST['birthday'];
                            $address = $_POST['address'];
                            $pass_hash = password_hash($pass, PASSWORD_BCRYPT);
                            $result = addTeacher($id_teacher, $user, $name, $pass_hash, $birthday, $phone, $email, $address, $gender, $role );
                            if ($result > 0) {
                                echo '
                                <script type="text/javascript">
                                alert("???? th??m nh??n vi??n m???i!");
                                window.location.href = "index.php?act=teacher";
                                </script>
                                ';
                                } else {
                                    echo '
                                <script type="text/javascript">
                                alert("Kh??ng t???o th??m ???????c nh??n vi??n m???i!");
                                window.location.href = "index.php?act=teacher";
                                    </script>
                                ';
                            }
                        }
                        include "../view/teacher_add.php";
                        break;
                    case 'teacher':
                        $teachers=allteachers();
                        include "../view/teacher.php";
                        break;
    
                    case 'teacher_del':
                        $id = $_GET['id'];
                        delUser($id);
                        header('location: index.php?act=teacher');
                        break;
    
                    case 'teacher_edit':
                        $id = $_GET['id'];
                        $u = getUser($id);
                        if (isset($_POST['Save'])) {
                            $id = $_POST['id'];
                            $user = $_POST['user'];
                            $pass = $_POST['pass'];
                            $newpass = $_POST['newpass'];
                            if ($newpass != "" && (!password_verify($newpass, $pass))) {
                                $pass = password_hash($newpass, PASSWORD_BCRYPT);
                            }
                            $name = $_POST['name'];
                            $phone = $_POST['phone'];
                            $email = $_POST['email'];
                           
                            $address = $_POST['address'];
                            $gender = $_POST['gender'];
                            $result = updateTeacher($id, $user, $name, $pass, $phone, $email,  $address, $gender);
                            if ($result) {
                                echo '
                                <script type="text/javascript">
                                alert("???? c???p nh???t th??ng tin ng?????i d??ng!");
                                window.location.href = "index.php?act=tecaher";
                                </script>
                                ';
                                } else {
                                    echo '
                                <script type="text/javascript">
                                alert("C???p nh???t th???t b???i!");
                                window.location.href = "index.php?act=teacher";
                                    </script>
                                ';
                            }
                        }
                        include "../view/teacher_edit.php";
                        break;

                case 'catalog':
                    $catalog = allCatalogs();
                    include "../view/catalog.php";
                    break;
                
                case 'catalog_del':
                    $cid = $_GET['cid'];
                    delCatalog($cid);
                    header('location: index.php?act=catalog');
                    break;
    
                case 'catalog_edit':
                    $id = $_GET['cid'];
                    $cat = getCatalog($id);
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $id_paretn = $_POST['id_paretn'];
                        $home = $_POST['home'];
                        $pro=$_POST['pro'];
                        $result = updateCatalog($id, $name, $id_paretn, $home, $pro);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("???? c???p nh???t danh m???c th??nh c??ng!");
                            window.location.href = "index.php?act=catalog";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("C???p nh???t th???t b???i!");
                            window.location.href = "index.php?act=catalog";
                                </script>
                            ';
                        }
                    }
                    include "../view/catalog_edit.php";
                    break;
                case 'catalog_add':
                    if (isset($_POST['Save'])){
                        $name = $_POST['name'];
                        $id_paretn = $_POST['id_paretn'];
                        $home = $_POST['home'];
                        $pro=$_POST['pro'];
                        $result = addCatalog($name, $id_paretn, $home, $pro);
                        if ($result > 0) {
                            echo '
                            <script type="text/javascript">
                            alert("???? t???o danh m???c m???i!");
                            window.location.href = "index.php?act=catalog";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Kh??ng t???o ???????c danh m???c m???i!");
                            window.location.href = "index.php?act=catalog";
                                </script>
                            ';
                        }
                    }
                    include "../view/catalog_add.php";
                    break;
                case 'product':
                    $products = allProducts();
                    include "../view/product.php";
                    break;
                    
                case 'product_del':
                    $id = $_GET['pid'];
                    delProduct($id);
                    header('location: index.php?act=product');
                    break;
    
                case 'product_edit':
                    $id = $_GET['pid'];
                    $p = getProductDetail($id);
    
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $id_catalog = $_POST['id_catalog'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $id_author=$_POST['id_author'];
                        $detail = $_POST['detail'];
                        $view = $_POST['view'];
                        $rating = $_POST['rating'];
                        $hot = $_POST['hot'];
                        $bestseller = $_POST['bestseller'];
                        $new = $_POST['new'];
                        if ($_FILES['new_image']['name']) {
                            $new_image = $_FILES['new_image']['name'];
                            $tmp_image = $_FILES['new_image']['tmp_name'];
                            move_uploaded_file($tmp_image, "../../upload/" . $new_image);
                        } else $new_image = $p['image'];
                        $result = updateProduct($id, $id_catalog, $name, $new_image, $price, $id_author,  $detail, $view, $rating, $hot, $bestseller, $new);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("???? c???p nh???t s???n ph???m th??nh c??ng!");
                            window.location.href = "index.php?act=product";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("C???p nh???t th???t b???i!");
                            window.location.href = "index.php?act=product";
                                </script>
                            ';
                        }
                    }
                    include "../view/product_edit.php";
                    break;
    
                case 'product_add':
                    if (isset($_POST['Save'])) {
                        $id_catalog = $_POST['id_catalog'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $id_author=$_POST['id_author'];
                        $detail = $_POST['detail'];
                        $view = $_POST['view'];
                    
                        $rating = $_POST['rating'];
                        $hot = $_POST['hot'];
                        $bestseller = $_POST['bestseller'];
                        $new = $_POST['new'];
                        if ($_FILES['new_image']['name']) {
                            $new_image = $_FILES['new_image']['name'];
                            $tmp_image = $_FILES['new_image']['tmp_name'];
                            move_uploaded_file($tmp_image, "../../upload/" . $new_image);
                        } else $new_image=NULL;
    
                        $result = addProduct($id_catalog, $name, $new_image, $price, $id_author,  $detail, $view,$rating, $hot, $bestseller, $new);
                        
                        if ($result > 0) {
                            echo '
                            <script type="text/javascript">
                            alert("???? t???o s???n ph???m m???i!");
                            window.location.href = "index.php?act=product";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Kh??ng t???o ???????c s???n ph???m m???i!");
                            window.location.href = "index.php?act=product";
                                </script>
                            ';
                        }
                    }
                    include "../view/product_add.php";
                    break;
                case 'author':
                    $author = allAuthors();
                    include "../view/author.php";
                    break;
                case 'author_del':
                    $id = $_GET['auid'];
                    delAuthor($id);
                    header('location: index.php?act=author');
                    break;
                case 'author_edit':
                    $id = $_GET['auid'];
                    $a = getAuthor($id);
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $result = updateAuthor($id, $name);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("C???p nh???t th??ng tin t??c gi??? th??nh c??ng!");
                            window.location.href = "index.php?act=author";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("C???p nh???t th???t b???i!");
                            window.location.href = "index.php?act=author";
                                </script>
                            ';
                        }
                    }
                    include "../view/author_edit.php";
                    break;
    
                case 'author_add':
                    if (isset($_POST['Save'])){
                        $name = $_POST['name'];
                        $result = addAuthor($name);
                        if ($result > 0) {
                            echo '
                            <script type="text/javascript">
                            alert("???? th??m t??c gi??? m???i!");
                            window.location.href = "index.php?act=author";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Kh??ng t???o ???????c t??c gi??? m???i!");
                            window.location.href = "index.php?act=author";
                                </script>
                            ';
                        }
                    }
                    include "../view/author_add.php";
                    break;
                
                case 'order':
                    $order = allOrders();
                    $list_status = getListStatus();
                    include "../view/order.php";
                    break;

                case 'order_del':
                    $id = $_GET['order_id'];
                    delOrder($id);
                    header('location: index.php?act=order');
                    break;

                case 'order_edit':
                    $id = $_GET['order_id'];
                    $order = getOrder($id);
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $id_status = $_POST['id_status'];
                        $date = $_POST['date'];
                        $position = $_POST['position'];
                        $payment = $_POST['payment'];
                        $result = updateOrder($id, $name, $phone, $email, $address, $id_status, $date, $position, $payment);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("C???p nh???t ????n h??ng th??nh c??ng!");
                            window.location.href = "index.php?act=order";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("C???p nh???t th???t b???i!");
                            window.location.href = "index.php?act=order";
                                </script>
                            ';
                        }
                    }
                    include "../view/order_edit.php";
                    break;
                
                case 'order_detail':
                    $id = $_GET['order_id'];
                    $list_order = getOrderDetail($id);
                    $list_product = orderDetailProduct($id);
                    include "../view/order_detail.php";
                    break;
                case 'comment':
                    $comments = get_comments();
                    include '../view/comment.php';
                    break;
                case 'comment_del':
                    $cmt_id = $_GET['id'];
                    $result = del_comment_by_id($cmt_id);
                    if($result) {
                        header('Location: ?act=comment');
                    }
                    else {
                        echo "<script>alert(`???? c?? l???i x???y ra vui l??ng th??? l???i`)</script>";
                    }
                    break;
                
                case 'logout':
                    if(isset($_SESSION['id'])) unset($_SESSION['id']);
                    if(isset($_SESSION['user'])) unset($_SESSION['user']);
                    if(isset($_SESSION['admin'])) unset($_SESSION['admin']);
                    header('location: ../../index.php');
                    break;
                case 'thongke':
                    include '../view/thongke.php';
                    break;
                default:
                    include "../view/home.php";
            }
            
        }
        else {
            include "../view/home.php";
        }
    }
    include "../view/footer.php";
?>