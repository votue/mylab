/* update ajax selfinfo */
function usrUpSelfInfo(obj){
    var userId = $(obj).attr('data-user-id');
    $(obj).parent().hide();
    $('.defBrieInfo').hide();
    $('#modifyInfoForm').show();
}

function usrSubmitInfo(obj){
    var $that = $(obj);
    $.ajax({
        type: "POST",//"GET" or "POST"
        data: $(obj).serialize(), // serialize data from form
        url: baseUrl+'/user/updateAjaxIntro',
        success: function(data) {
            window.location = baseUrl+'/user/myaccount';
        },
        error: function() {
            return false;
        }       
    });
    return false;
}
/* update ajax links */
function usrUpLinks(obj){
    var userId = $(obj).attr('data-user-id');
    $('.defLinksInfo').hide();
    $('#modifyLinksForm').show();
    $(obj).parent().hide();
}
function usrSubmitLinks(obj){
    var $that = $(obj);
    $.ajax({
        type: "POST",//"GET" or "POST"
        data: $(obj).serialize(), // serialize data from form
        url: baseUrl+'/user/UpdateAjax',
        success: function(data) {
            window.location = baseUrl+'/user/myaccount';
        },
        error: function() {
            return false;
        }       
    });
    return false;
}
/* update job info */
function usrUpJob(obj){
    var userId = $(obj).attr('data-user-id');
    $('.defJobInfo').hide();
    $('#modifyJobsForm').show();
    $(obj).parent().hide();
}

function usrSubmitJob(obj){
    var $that = $(obj);
    $.ajax({
        type: "POST",//"GET" or "POST"
        data: $(obj).serialize(), // serialize data from form
        url: baseUrl+'/user/UpdateAjax',
        success: function(data) {
            window.location = baseUrl+'/user/myaccount';
        },
        error: function() {
            return false;
        }       
    });
    return false;
}

/* update basic info */
function usrUpBasic(obj){
    var userId = $(obj).attr('data-user-id');
    $('.defBasicInfo').hide();
    $('#modifyBasicForm').show();
    $(obj).parent().hide();
}

function usrSubmitBasic(obj){
    var $that = $(obj);
    $.ajax({
        type: "POST",//"GET" or "POST"
        data: $(obj).serialize(), // serialize data from form
        url: baseUrl+'/user/UpdateAjax',
        success: function(data) {
            window.location = baseUrl+'/user/myaccount';
        },
        error: function() {
            return false;
        }       
    });
    return false;
}

/* update location info */
function usrUpLocal(obj){
    var userId = $(obj).attr('data-user-id');
    $('.defLocalInfo').hide();
    $('#modifyLocalForm').show();
    $(obj).parent().hide();
} 

function usrSubmitLocal(obj){
    var $that = $(obj);
    $.ajax({
        type: "POST",//"GET" or "POST"
        data: $(obj).serialize(), // serialize data from form
        url: baseUrl+'/user/UpdateAjax',
        success: function(data) {
            window.location = baseUrl+'/user/myaccount';
        },
        error: function() {
            return false;
        }       
    });
    return false;
}