<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?= SITETITLE ?></title>
  <link rel="stylesheet" href=<?= UPATH . "assets/css/style.css";?>>
  <link rel="stylesheet" href=<?= UPATH . "assets/css/custom.css";?>>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="task-manager">
  <div class="left-bar">
    <div class="upper-part">
      <div class="actions">
        <div class="circle"></div>
        <div class="circle-2"></div>
      </div>
    </div>
    <div class="left-content">
    <span class="delete-fld-msg"><?= $deleteResult;?></span>
      <ul class="action-list">
      <li class="item">
          <a href="<?=base_url()?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-inbox"
              viewBox="0 0 24 24">
              <path d="M22 12h-6l-2 3h-4l-2-3H2" />
              <path
                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
            </svg>
            <span>Today Tasks</span>
          </a>
        </li>
        <?php
          foreach($foldersList as $folder):
        ?>
        <li class="item">
          <a href='<?= base_url("?folder_id=$folder->id")?>'>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-inbox"
              viewBox="0 0 24 24">
              <path d="M22 12h-6l-2 3h-4l-2-3H2" />
              <path
                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
            </svg>
            <span>
              <?= $folder->folder_name ?>
            </span>
          </a>
          <a class="del-folder" href='<?= base_url("?delete-folder=$folder->id")?>'><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="red" d="M315.3 411.3c-6.253 6.253-16.37 6.253-22.63 0L160 278.6l-132.7 132.7c-6.253 6.253-16.37 6.253-22.63 0c-6.253-6.253-6.253-16.37 0-22.63L137.4 256L4.69 123.3c-6.253-6.253-6.253-16.37 0-22.63c6.253-6.253 16.37-6.253 22.63 0L160 233.4l132.7-132.7c6.253-6.253 16.37-6.253 22.63 0c6.253 6.253 6.253 16.37 0 22.63L182.6 256l132.7 132.7C321.6 394.9 321.6 405.1 315.3 411.3z"/></svg></a>
        </li>
        <?php endforeach; ?>
      </ul>
      <ul>
        <li class="add-folder">
          <input type="text" class="add-folder" id="add-folder-input" placeholder="Folder name">
          <a href="" class="add-folder-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#009e90" d="M432 256C432 264.8 424.8 272 416 272h-176V448c0 8.844-7.156 16.01-16 16.01S208 456.8 208 448V272H32c-8.844 0-16-7.15-16-15.99C16 247.2 23.16 240 32 240h176V64c0-8.844 7.156-15.99 16-15.99S240 55.16 240 64v176H416C424.8 240 432 247.2 432 256z"/></svg></a>
      </li>
      </ul>
    </div>
  </div>
  <div class="page-content">
    <div class="header">Today Tasks</div>
    <div class="content-categories">
      <div class="label-wrapper">
        <input class="nav-item" name="nav" type="radio" id="opt-1" checked>
        <label class="category" for="opt-1">All</label>
      </div>
    </div>
    <div class="tasks-wrapper">
    <?php 
        $count = 1;
        foreach($taskList as $task):
      ?>
      <div class="task">
        <div>
          <input class="task-item" name="task" type="checkbox" value="<?= $task->id ?>" id="item-<?= $count ?>" <?= ($task->is_done) ? 'checked' : '' ?> >
          <label for="item-<?= $count ?>">
            <span class="label-text"><?= $task->title ?></span>
          </label>
        </div>
        <div>
        <span class="tag <?= ($task->is_done) ? 'approved' : '' ?>"><?= $task->crated_at ?></span>
        <a class="del-task" href="?delete-task=<?= $task->id ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="red" d="M315.3 411.3c-6.253 6.253-16.37 6.253-22.63 0L160 278.6l-132.7 132.7c-6.253 6.253-16.37 6.253-22.63 0c-6.253-6.253-6.253-16.37 0-22.63L137.4 256L4.69 123.3c-6.253-6.253-6.253-16.37 0-22.63c6.253-6.253 16.37-6.253 22.63 0L160 233.4l132.7-132.7c6.253-6.253 16.37-6.253 22.63 0c6.253 6.253 6.253 16.37 0 22.63L182.6 256l132.7 132.7C321.6 394.9 321.6 405.1 315.3 411.3z"/></svg></a>
      </div></div>
      <?php
        $count++; 
        endforeach;
      ?>
    </div>
    <div class="task-wrapper add-task">
      <ul>
          <li class="add-task">
            <input type="text" class="add-folder add-task" id="add-task-input" placeholder="Add a task">
            <a href="" class="add-task-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#009e90" d="M432 256C432 264.8 424.8 272 416 272h-176V448c0 8.844-7.156 16.01-16 16.01S208 456.8 208 448V272H32c-8.844 0-16-7.15-16-15.99C16 247.2 23.16 240 32 240h176V64c0-8.844 7.156-15.99 16-15.99S240 55.16 240 64v176H416C424.8 240 432 247.2 432 256z"/></svg></a>
        </li>
        </ul>
    </div>
  </div>
  <div class="right-bar">
    <div class="top-part">
      <div class="userprofile"><img src="<?= $currentUser->gravatar ?>"></div>
      <div class="displayname"><span><?= $currentUser->name ?></span></div>
    </div>
    <div class="header">Schedule</div>
    <div class="right-content">

      <div class="task-box yellow">
        <div class="description-task">
          <div class="time">08:00 - 09:00 AM</div>
          <div class="task-name">بررسی سایت فیوننس</div>
        </div>
        <div class="more-button"></div>
      </div>

      <div class="task-box blue">
        <div class="description-task">
          <div class="time">10:00 - 11:00 AM</div>
          <div class="task-name">طراحی و پیاده سازی هدر</div>
        </div>
        <div class="more-button"></div>
      </div>

      <div class="task-box red">
        <div class="description-task">
          <div class="time">01:00 - 02:00 PM</div>
          <div class="task-name">جلسه با اعضای تیم سایت</div>
        </div>
        <div class="more-button"></div>
      </div>
      
    </div>
  </div>
</div>
<!-- partial -->
  <script src=<?= UPATH . "assets/js/jQuery.js"?>></script>  
  <script src=<?= UPATH . "assets/js/ajax-jQuery.js"?>></script>
  
  <script>
    function addTaskFun(event){
        event.preventDefault();
        let new_task_input = $('input#add-task-input').val();
        if (new_task_input.length > 3) {
            $.ajax({
                url:"process/ajax-handler.php",
                method:"post",
                data:{
                    action:"add-new-task",
                    nametask:new_task_input,
                    foldername: <?= $_GET['folder_id'] ?? 0  ?>
                },
                success:function(response){
                        $('#add-task-input').val('');
                        $('<div class="task"><input class="task-item" name="task" type="checkbox" id="item-1"> <label for="item-1"><span class="label-text">'+ new_task_input +'</span></label><span class="tag ">Now</span></div>').appendTo('.tasks-wrapper');
                        $('#add-task-input').css('border', '1px solid transparent');
                        $('#add-task-input').css('border-bottom', '1px solid #ddd');
                }
            })
        } else {
            $('#add-task-input').css('border', '1px solid red');
        }
    }

        $('#add-task-input').on('keypress',function(event) {
            if(event.which == 13) {
                addTaskFun(event)
            }
        });
        
        $('a.add-task-btn').click(function(event) {
            addTaskFun(event)
        })
  </script>

</body>
</html>
