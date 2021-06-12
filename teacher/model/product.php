<?php
    function getProductDetail($id){
        $sql="select * from product where id=".$id;
        return getone($sql);
    }

    function allProducts(){
        $sql = "select * from product";
        return getlist($sql);
    }

    function delProduct($id){
        $sql = "DELETE FROM product WHERE id='$id'";
        execsql($sql,0);
        return true;
    }

    function updateProduct($id, $id_catalog, $name, $new_image, $video, $id_author,  $detail, $new){
        
        $sql = "UPDATE product SET id_catalog='$id_catalog', name='$name', image='$new_image', video='$video', id_author='$id_author', detail='$detail', new='$new' WHERE id='$id'";
        execsql($sql,1);
        return true;
    }

    function addProduct($id_catalog, $name, $new_image, $video, $id_author,  $detail, $new){
        
        $sql="INSERT INTO product (id_catalog, name, image, video, id_author,  detail, new) 
        VALUES ('$id_catalog', '$name', '$new_image', '$video', '$id_author', '$detail', '$new')";
        
        return addsql($sql);
    }
?>