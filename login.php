<?php
    include "bootstrap/init.php";

    $base_uri = $_SERVER['PHP_SELF'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $actionLogin = $_GET['action'];
        $params = $_POST;
        if($actionLogin == 'login'){
            
            // echo "login";

        }else if($actionLogin =='register'){
            $response = userRegister($params);
            if(!$response){
                notic('ورود ناموفق!', 'err-msg');
            }else{
                notic('ثبت نام با موفقیت انجام شد :)', 'success-msg');
            }
        }
    }
    include "tpl/tpl-auth.php";