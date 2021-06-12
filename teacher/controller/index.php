<?php
    session_start();
    // include "../model/exercise.php";
    include "../../model/connect.php";
    require_once "../model/exercise.php";
    include "../model/product.php";
    include "../model/status.php";
    include "../view/global.php"; 
    include "../view/header.php";

    if (!isset($_SESSION['teacher'])) {
        header('location: ../../index.php');
    } else {
        if(isset($_GET['act'])){
            $act = $_GET['act'];
            switch($act){
                case 'exercise':
                     $exercises = allExercise();
                    include "../view/exercise.php";
                    break;
                case 'exercise_del':
                    $id = $_GET['eid'];
                    delExercise($id);
                    header('location: index.php?act=exercise');
                    break;
                case 'exercise_edit':
                    $id = $_GET['eid'];
                    $e = getExerciseDetail($id);
    
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $question = $_POST['question'];
                        $answer=$_POST['answer'];
                        $CA = $_POST['CA'];
                        $CB=$_POST['CB'];
                        $CC = $_POST['CC'];
                        $CD = $_POST['CD'];
                        $result = updateExercise($id, $name, $question, $answer, $CA,  $CB, $CC, $CD);
                        
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã cập nhật thành công!");
                            window.location.href = "index.php?act=exercise";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Cập nhật thất bại!");
                            window.location.href = "index.php?act=exercise";
                                </script>
                            ';
                        }
                    }
                    include "../view/exercise_edit.php";
                    break;
    
                case 'exercise_add':
                        if (isset($_POST['Save'])) {
                            $id = $_POST['id'];
                            $name = $_POST['name'];
                            $question = $_POST['question'];
                            $answer=$_POST['answer'];
                            $CA = $_POST['CA'];
                            $CB=$_POST['CB'];
                            $CC = $_POST['CC'];
                            $CD = $_POST['CD'];
                            $result = addExercise($id, $name, $question, $answer, $CA,  $CB, $CC, $CD);
                            if ($result > 0) {
                                echo '
                                <script type="text/javascript">
                                alert("Đã tạo câu hỏi mới!");
                                window.location.href = "index.php?act=exercise";
                                </script>
                                ';
                                } else {
                                    echo '
                                <script type="text/javascript">
                                alert("tạo được câu hỏi mới!");
                                window.location.href = "index.php?act=exercise";
                                    </script>
                                ';
                            }
                        }
                    include "../view/exercise_add.php";
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
                        $video = $_POST['video'];
                        $id_author=$_POST['id_author'];
                        $detail = $_POST['detail'];
                        $new = $_POST['new'];
                        if ($_FILES['new_image']['name']) {
                            $new_image = $_FILES['new_image']['name'];
                            $tmp_image = $_FILES['new_image']['tmp_name'];
                            move_uploaded_file($tmp_image, "../../upload/" . $new_image);
                        } else $new_image = $p['image'];
                        $result = updateProduct($id, $id_catalog, $name, $new_image, $video, $id_author,  $detail, $new);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã cập nhật bài giảng thành công!");
                            window.location.href = "index.php?act=product";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Cập nhật thất bại!");
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
                        $video = $_POST['video'];
                        $id_author=$_POST['id_author'];
                        $detail = $_POST['detail'];
                        $new = $_POST['new'];
                        if ($_FILES['new_image']['name']) {
                            $new_image = $_FILES['new_image']['name'];
                            $tmp_image = $_FILES['new_image']['tmp_name'];
                            move_uploaded_file($tmp_image, "../../upload/" . $new_image);
                        } else $new_image=NULL;
    
                        $result = addProduct($id_catalog, $name, $new_image, $video, $id_author,  $detail,  $new);
                        
                        if ($result > 0) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã tạo sản phẩm mới!");
                            window.location.href = "index.php?act=product";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Không tạo được sản phẩm mới!");
                            window.location.href = "index.php?act=product";
                                </script>
                            ';
                        }
                    }
                    include "../view/product_add.php";
                    break;
                case 'logout':
                    if(isset($_SESSION['id'])) unset($_SESSION['id']);
                    if(isset($_SESSION['user'])) unset($_SESSION['user']);
                    if(isset($_SESSION['admin'])) unset($_SESSION['admin']);
                    header('location: ../../index.php');
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