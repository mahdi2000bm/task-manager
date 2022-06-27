<?php
    $userId = currentUser()->id ?? null;
    function getFolders(){
        global $conn;
        global $userId;
        $sql = "SELECT * FROM folders WHERE user_id = $userId";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $records;
    }
    function deleteFolder($folderid){
        global $conn;
        $sql = "DELETE from folders WHERE id = $folderid";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
    function addFolder($foldername){
        global $conn;
        global $userId;        
        $sql = "INSERT INTO folders (folder_name,user_id) VALUES ( :foldername , :userid )";
        $stmt = $conn->prepare($sql);
        $stmt->execute( array(':foldername' => $foldername , ':userid'=> $userId));
    }
    function getTasks($folder_id){
        global $conn;
        global $userId;
        $sql = "SELECT * FROM tasks WHERE user_id = $userId && folder_id = $folder_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $records;
    }
    function addTask($foldertask,$foldername){
        global $conn;
        global $userId;
        $sql = "INSERT INTO tasks (title,user_id,folder_id) VALUES ( :title , :userid, :folder_id )";
        $stmt = $conn->prepare($sql);
        $stmt->execute( array(':title' => $foldertask , ':userid'=> $userId , ':folder_id'=> $foldername ));
    }
    function deleteTask($taskid){
        global $conn;
        $sql = "DELETE from tasks WHERE id = :task_id ";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':task_id' => $taskid));
    }
    function doneTask($doneid){
        global $conn;
            /*Check Task status*/
            $get_sql = "SELECT is_done FROM tasks  WHERE id = :doneid ";
            $stmt = $conn->prepare($get_sql);
            $stmt->execute(array(':doneid' => $doneid));
            $task_state = $stmt->fetchAll(PDO::FETCH_OBJ);
            /*Set Task status*/
            $state = (intval($task_state[0]->is_done)) ? 0 : 1 ;
            /* Update task status */
            $sql = "UPDATE tasks SET is_done = $state WHERE id = $doneid ";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(':task_id' => $doneid ));
    }