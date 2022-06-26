$(document).ready(function() {
    $('a.add-folder-btn').click(function(event) {
        event.preventDefault();
        let new_folder_input = $('input#add-folder-input').val();
        if (new_folder_input.length > 2 ) {
            $.ajax({
                url:"process/ajax-handler.php",
                method:"post",
                data:{
                    action:"add-new-folder",
                    namefolder:new_folder_input,
                },
                success:function(response){
                        $('<li class="item"><a href="?folder_id=<?= $folder->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-inbox" viewBox="0 0 24 24"> <path d="M22 12h-6l-2 3h-4l-2-3H2" /> <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" /> </svg><span>'+ new_folder_input +'</span></a> <a class="del-folder" href="?delete-folder"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="red" d="M315.3 411.3c-6.253 6.253-16.37 6.253-22.63 0L160 278.6l-132.7 132.7c-6.253 6.253-16.37 6.253-22.63 0c-6.253-6.253-6.253-16.37 0-22.63L137.4 256L4.69 123.3c-6.253-6.253-6.253-16.37 0-22.63c6.253-6.253 16.37-6.253 22.63 0L160 233.4l132.7-132.7c6.253-6.253 16.37-6.253 22.63 0c6.253 6.253 6.253 16.37 0 22.63L182.6 256l132.7 132.7C321.6 394.9 321.6 405.1 315.3 411.3z"/></svg></a> </li>').appendTo('.action-list');
                        $('#add-folder-input').css('border', '1px solid transparent');
                        $('#add-folder-input').css('border-bottom', '1px solid #ddd');
                        $('#add-folder-input').val('');
                }
            })
        } else {
            $('#add-folder-input').css('border', '1px solid red');
        }

    })
    $('input.task-item').change(function() {
        let done_task = this.value;
        $.ajax({
            url:"process/ajax-handler.php",
            method:"post",
            data:{
                action:"done-task",
                done_task_id : done_task
            },
            success:function(response){
                console.log(response);
            }
        })
    })
})
