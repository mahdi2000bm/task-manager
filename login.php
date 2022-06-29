<?php
    include "bootstrap/init.php";

    $base_uri = $_SERVER['PHP_SELF'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $actionLogin = $_GET['action'];
        $params = $_POST;

        if($actionLogin == 'login'){
            $response = userLogin($params['email'], $params['password']);

            if(!$response){
                notic('رمز عبور یا ایمیل نامعبتر', 'err-msg');
                
            }else{
                reDirect('index.php');
            }

        }else if($actionLogin =='register'){
            // $response = userRegister($params);
            if(strlen(strval($params['email'])) < 13 ){
             notic('ایمیل نامعتبر', 'err-msg'); ;
            }
            // if(!$response){
            //     notic('! ثبت نام ناموفق', 'err-msg');
            // }else{
            //     notic('ثبت نام با موفقیت انجام شد :)', 'success-msg');
            // }
        }
    }
    include "tpl/tpl-auth.php";