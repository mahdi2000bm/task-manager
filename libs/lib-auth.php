<?php
    function is_logged(){
        return (isset($_SESSION['currentUser'])) ? true : false;
    }
    function currentUser(){
        if(is_logged()){
            return $_SESSION['currentUser'] ?? null;
        }
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

            $_SESSION['currentUser'] = $userStatus;
            $userStatus->gravatar = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $userStatus->email ) ) );

            return true;
        }
        return false;
    }