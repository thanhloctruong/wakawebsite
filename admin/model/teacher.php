<?php
    function allTeachers(){
        $sql = "SELECT * from customers  where role = '2'";
        return getlist($sql);
    }

    function delTeacher($id){
        $sql = "DELETE FROM customers WHERE id='$id'";
        execsql($sql,0);
        return true;
    }

    function getTeacher($id){
        $sql="select * from customers where id='$id'";
        return getone($sql);
    }

    function updateTeacher($id, $user, $name, $pass, $phone, $email, $address, $gender){
        $sql = "UPDATE customers SET user='$user', name='$name', pass='$pass', phone='$phone', email='$email',  address='$address', gender='$gender' WHERE id='$id'";
        execsql($sql,1);
        return true;
    }
    function addTeacher($id_teacher, $user, $name, $pass, $birthday, $phone, $email, $address, $gender, $role ){
        $sql="INSERT INTO customers (id, user  , name, pass, phone,  email, date, address, role, gender) 
        VALUES ('$id_teacher', '$user', '$name', '$pass', '$phone', '$email', '$birthday', '$address', '$role', '$gender')";
        
        return addsql($sql);
    }
?>