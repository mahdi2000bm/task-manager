<?php
    include "const.php";
    include DPATH . "bootstrap/helper.php";    
    include DPATH . "bootstrap/config.php";

        $dsn = "mysql:dbname=TodoList;host=localhost;";
        try {
            $conn = new PDO($dsn, "root", "");
        } catch (PDOException $result_e) {
            diemsg($result_e);
            die();
        }
        
    include DPATH . "libs/lib-data.php";
    include DPATH . "libs/lib-auth.php";