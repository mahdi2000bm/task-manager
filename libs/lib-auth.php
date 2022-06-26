<?php
    function is_logged(){
        return false;
    }
    function userRegister($data){
        global $conn;
        $passEncode = password_hash($data['password'] , PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (name,email,password) VALUES ( :name , :email , :password )";
        $stmt = $conn->prepare($sql);
        $stmt->execute( array(':name' => $data['name'] , ':email'=> $data['email'] , ':password'=> $passEncode));
        return $stmt->rowCount() ? true : false ;
    }