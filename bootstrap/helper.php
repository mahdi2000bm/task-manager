<?php

    function diemsg($msg){
        echo "<div class='fatalerror' style='width: 80%; margin: auto; background: #ffb1b1; color: #740505; padding: 10px 30px; border-radius: 8px; border: 1px solid #fd5050;'>$msg<div>";
        die();
    }
    function checkAjax(){
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER    ['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
            return true;
        }
        return false;
    }
    function dd($arr){
        echo "<div class='dump-pre' style='position: absolute; width: 60%; top: 0; z-index: 999;'><pre style='color: #dcdcdc; background: #364ab3; font-size: 16px; padding: 24px; border-radius: 16px;'>";
        var_dump($arr);
        echo "<pre></div>";
    }
     function base_url($uri = ""){
       return UPATH . $uri ;
    }
    function notic($msg, $class = "alert"){
        echo "<div class='modalnotic {$class}'>$msg</div>";
    }