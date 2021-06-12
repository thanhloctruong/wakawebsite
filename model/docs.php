<?php
    function showDocs() {
        $sql = "Select * from doc";
        return getlist($sql);
    }


?>