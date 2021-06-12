<?php
    function allExercise(){
    $sql = "select * from exercise";
    return getlist($sql);
    }
    function getExerciseDetail($id){
        $sql="select * from exercise where id=".$id;
        return getone($sql);
    }
    function delExercise($id){
        $sql = "DELETE FROM exercise WHERE id ='$id'";
        execsql($sql,0);
        return true;
    }

    function updateExercise($id, $name, $question, $answer, $CA,  $CB, $CC, $CD){
        
        $sql = "UPDATE exercise SET id='$id', name='$name', question='$question', answer='$answer', CA='$CA', CB='$CB', CC='$CC', CD='$CD' WHERE id='$id'";
        execsql($sql,1);
        return true;
    }

    function addExercise($id, $name, $question, $answer, $CA,  $CB, $CC, $CD){
        
        $sql="INSERT INTO exercise (id, name, question, answer, CA,  CB, CC, CD) 
        VALUES ('$id', '$name', '$question', '$answer', '$CA', '$CB', '$CC', '$CD')";
        
        return addsql($sql);
    }
?>