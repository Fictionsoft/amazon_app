/**
 * Created by Fictionsoft on 3/16/15.
 */
/**
 * Created by bakar on 29/12/14.
 */
$(document).ready(function($){
    $('.video-container').hover(function(){

        $(this).find(".video-watch-section").fadeIn(500);

    },function(){
        $(this).find(".video-watch-section").fadeOut(500)
    })

});

// comple task
function completeTask( user_id, user_task_id,c) {
    $('#loader').show();
    $.post($('#base_url').val()+'completed_tasks/task_complete/'+ user_id +'/'+ user_task_id,function(data){
        if(data=='success'){
            $('#btn-xs'+c).removeClass('btn-disable');
            $('#btn-xs'+c).addClass('btn-success');

        }
        $('#loader').hide();
    });
}


// Date picker
// Use date picker
$(function() {
    $( ".date_picker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd/mm/yy'
    });

    //$( ".date_picker").readOnly(true);

});


function getProduct(id){

    /*$.post(BASE_URL+'messages/send_job_invite',$("#job-invite"+id).serialize(),function(data){
        if(data.status){
            $("#job-invite"+id)[0].reset();
            $('.notice').removeClass('alert alert-danger').addClass('alert alert-success').show();

            setTimeout(function() {
                $('#send_invite_'+id).modal('hide');
            }, 2500);

            $('#btn_send_invite_'+id).addClass('hide');


        }else{
            $('.notice').addClass('alert alert-danger').removeClass('alert alert-success').show();
        }

        $('.notice').delay(2000).fadeOut(300);

        $('.notice').html(data.msg);

    },'json');*/


    alert("aqwer asdf asd f  asdfasd"+id);
}
