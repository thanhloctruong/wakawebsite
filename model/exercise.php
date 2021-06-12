<?php
    function showexercise() {
        $sql = "Select * from exercise";
        return getlist($sql);
    }
?>