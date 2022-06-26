<?php
    include "bootstrap/init.php";
    if(!is_logged()){
        header("Location:". base_url('login.php'));
    }
    $deleteResult = "";
    if(isset($_GET['delete-folder']) && is_numeric($_GET['delete-folder'])){
        global $deleteResult;
        $deleteResult = deleteFolder($_GET['delete-folder']) . " folder deleted !";
    }
    if(isset($_GET['delete-task']) && is_numeric($_GET['delete-task'])){
        deleteTask($_GET['delete-task']);
    }
    $folder_id = (!empty($_GET['folder_id']) && ($_GET['folder_id']) > 0) ? $_GET['folder_id'] : 0;
    $foldersList = getFolders();
    $taskList = getTasks($folder_id);
    
    include "tpl/tpl-index.php";