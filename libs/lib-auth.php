<?php
    function is_logged(){
        return false;
    }
    function checkUser($email){
        global $conn;
        $sql = "SELECT * FROM users WHERE email = :mail";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':mail' => $email));
        $records = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $records[0] ?? null;
    }
    function userRegister($data){
        global $conn;
        $passEncode = password_hash($data['password'] , PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (name, email, password) VALUES ( :name , :email , :password )";
        $stmt = $conn->prepare($sql);
        $stmt->execute( array(':name' => $data['name'] , ':email'=> $data['email'] , ':password'=> $passEncode));
        return $stmt->rowCount() ? true : false ;
        

    }
    function userLogin($email, $pass){

        $userStatus = checkUser($email);

        if(is_null($userStatus)){
            return false;
        }
        if(password_verify($pass,$userStatus->password)){
            return true;
        }
        return false;
    }