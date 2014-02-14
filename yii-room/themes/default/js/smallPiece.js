$(document).ready(function(){
    $('.thum-img-tmp').hover(function(event){
        $(this).find('.delImgTmp').show();
    },function(event){
        $(this).find('.delImgTmp').hide();
    });
})

function delImgTmp(obj,type){
    if(type=='tmp'){
        if(confirm('Bạn có chắc sẽ xóa ảnh này?')){
            var name = $(obj).attr('data-sic-name');
            $.ajax({
                type: "get",
                data:{name:name,type:type},
                url: baseUrl+'/sicImage/deleteAjax',
                success: function(data) {
                    $(obj).fadeOut();
                    $(obj).remove();
                },
                error: function() {
                    console.log('delete error');
                }       
            });
        }
    }

    if(type=='img'){
        if(confirm('Bạn có chắc sẽ xóa ảnh này?')){
            var id = $(obj).attr('data-sicimage-id');
            $.ajax({
                type: "get",
                data:{id:id,type:type},
                url: baseUrl+'/sicImage/deleteAjax',
                success: function(data) {
                    $(obj).parents('.thum-img-tmp').parent().fadeOut().remove();
                    processSpanBoostrap($('.simBox .span4'),3);
                },
                error: function() {
                    console.log('delete error');
                }       
            });
        }
    }    
}

function refeshSimBox(id){
    $.ajax({
        type: "post",
        dataType: "html",
        data: {id:id},
        url: baseUrl+'/index/refeshSimBox',
        success: function(data) {
            $('.simBox').html(data);
            callPopover();
            processSpanBoostrap($('.simBox .span4'),3);
        },
        error: function() {
            console.log('render simbox error');
        }       
    });
}
function refeshTmpBox(){
    $.ajax({
        type: "post",
        dataType: "html",
        url: baseUrl+'/index/refeshTmpBox',
        success: function(data) {
            $('.tmpBox').html(data);
            callPopover();
            processSpanBoostrap($('.tmpBox .span4'),3);
        },
        error: function() {
            console.log('render tmp error');
        }       
    });
}
function selectCheck(obj){
    var id = $(obj).attr('dataId');
    $.ajax({
        type: "post",
        data:{id:id},
        url: baseUrl+'/sicImage/checkAjax',
        success: function(post_id) {
            refeshSimBox(post_id);
        },
        error: function() {
            console.log('check error');
        }       
    }); 
}

function editCaption(obj){
    var id = $(obj).attr('dataId');
    $.ajax({
        type: "Post",
        data: $(obj).serialize(),
        url: baseUrl+'/sicImage/editCaption?id='+id,
        success: function(data) {
            $(obj).find('input').attr('placeholder',data);
            $(obj).append('<div class="successAlert"></div>');
        },
        error: function() {
            $(obj).append('<div class="errorAlert"></div>');
        }       
    });

    return false;
}

function hideAlert(){
    setTimeout(function() {
        $('.successAlert,.errorAlert').fadeOut().remove();
    }, 6000);
}
