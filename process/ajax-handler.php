<?php
    include_once "../bootstrap/init.php";

    if(!checkAjax()){
        diemsg("Invalid Request!");
    }
   
    switch($_POST['action']){
        case 'add-new-folder':
            addFolder($_POST['namefolder']);
        break;
        case 'add-new-task':
            addTask($_POST['nametask'], $_POST['foldername']);
        break;
        case 'done-task':
            doneTask($_POST['done_task_id']);
        break;
        default:
            diemsg('invalide action');
    } 
  