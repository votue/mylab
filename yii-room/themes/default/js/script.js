$(window).load(function() {
    resizeImage();
    $('.loader_img').hide();
});
$(document).click(function(e) {
    /*$('.popover').each(function(){
        $(this).prev().popover('hide');
    });*/
});
$(document).ready(function(){
    callPopover();
    $('.searchMain .dropdown-menu li').click(function(){
        var value = $(this).attr('dataValue');
        var name = $(this).attr('dataName');
        $('.searchMain input[name="location"]').val(value);
        $('.searchMain .badge').html(name).show();
    });
    processSpanBoostrap($('.simBox .span4'),3);
    processSpanBoostrap($('.tmpBox .span4'),3);
    processSpanBoostrap($('#mainWrapper .span3'),4);
})

function processSpanBoostrap(select,sum){
    select.each(function(index){
        if(index%sum == 0){
            $(this).css({'margin-left':'0px','clear':'both'});
        } else {
            $(this).css('margin-left','2.5641%');
        }
    });
}
/* Comment */
function addCmtPost(obj){
    var id = $(obj).attr('dataId');
    $.ajax({
        type: "POST",
        data: $(obj).serialize(),
        url: baseUrl+'/comment/addCmtPost?id='+id,
        async: false,
        success: function(data) {
            $(obj).parents('.wrapComment').find('.allCmt').append(data);
            setFlashNotice('Bạn đã bình luận thành công','success');
            $(obj).find('.cmtCont').val('');
        }
    });
    return false;
}

function showEditCmt(obj){
    $(obj).parent().hide();
    $(obj).parent().next().show();
}

function editCmt(obj){
    var id = $(obj).attr('dataId');
    $.ajax({
        type: "POST",
        data: $(obj).serialize(),
        url: baseUrl+'/comment/editCmt?id='+id,
        async: false,
        success: function(data) {
            $(obj).prev().show();
            $(obj).prev().find('span').html(data);
            $(obj).hide();
            setFlashNotice('Bạn đã chỉnh sửa thành công','success');
        }
    });
}
function delCmt(obj){
    if(confirm("Bạn chắc chứ?")){
        var id = $(obj).attr('dataId');
        $.ajax({
            type: "POST",
            data:{id:id},
            url: baseUrl+'/comment/delCmt',
            async: false,
            success: function(data) {
                $(obj).parents('.itemContWall').remove();
            }
        });
    }
}

function setFlashNotice(message,type){
    $.ajax({
        type: "POST",
        data: {message:message,type:type},
        url: baseUrl+'/index/flashNotice',
        async: false,
        success: function(data) {
            $('.flashNotice').append(data);
        }
    });
}

function callPopover(){
    $('.optPop').each(function(){
        var id = $(this).attr('dataId');
        $(this).popover({
            placement: 'right',
            html:true,
            title:false,
            template: '<div class="popover optClass"><div class="arrow"></div><div class="popover-inner"><h3 class="popover-title"></h3><div class="popover-content"><p></p></div></div></div>',
            content: function(){
                var result='';
                $.ajax({
                    type: "GET",
                    data: {id:id},
                    url: baseUrl+'/post/renOptions',
                    async: false,
                    success: function(data) {
                        result = data;
                    }
                });
                return result;
            }
        });
    })

    $('.cmtPop').each(function(){
        var id = $(this).attr('dataId');
        var placement = $(this).attr('dataPlace');
        $(this).popover({
            placement: placement,
            html:true,
            title:false,
            template: '<div class="popover cmtClass"><div class="popover-inner"><h3 class="popover-title"></h3><div class="popover-content"><p></p></div></div></div>',
            content: function(){
                var result='';
                $.ajax({
                    type: "GET",
                    data: {id:id},
                    url: baseUrl+'/index/renCmtPost',
                    async: false,
                    success: function(data) {
                        result = data;
                    }
                });
                return result;
            }
        })
    })
    $('.setImgPop').each(function(){
        var id = $(this).attr('dataId');
        $(this).popover({
            placement: 'left',
            html:true,
            title:false,
            template: '<div class="popover setImgPopClass"><div class="arrow"></div><div class="popover-inner"><h3 class="popover-title"></h3><div class="popover-content"><p></p></div></div></div>',
            content: function(){
                var result='';
                $.ajax({
                    type: "GET",
                    data: {id:id},
                    url: baseUrl+'/post/renSetImgOpt',
                    async: false,
                    success: function(data) {
                        result = data;
                    }
                });
                return result;
            }
        });
    })
    $('.sharePopover').each(function(){
        var id = $(this).attr('dataId');
        var type = $(this).attr('dataType');
        
        $(this).popover({
            placement: 'left',
            html:true,
            title:false,
            content: function(){
                var result='';
                $.ajax({
                    type: "GET",
                    data: {id:id,type:type},
                    url: baseUrl+'/index/renSharePost',
                    async: false,
                    success: function(data) {
                        result = data;
                    }
                });
                return result;
            }
        })
    })

    $('#optionAccount').popover({
        placement: 'bottom',
        title: false,
        html: true,
        content: function(){
            var result='';
            $.ajax({
                type: "POST",
                url: baseUrl+'/user/userMenu',
                async: false,
                success: function(data) {
                    result = data;
                }
            });
            return result;
        }
    });
}
function closePop(obj){
    $(obj).parents('.popover').prev().popover('hide');
}
function likePost(obj){
    var id = $(obj).attr('dataId');
    $.ajax({
        type: "POST",
        data:{id:id},
        url: baseUrl+'/post/likeMe',
        async: false,
        success: function(data) {
            setFlashNotice('Bạn đã thích một bài đăng','success');
            refeshLike($(obj));
        }
    });
}
function dislikePost(obj){
    var id = $(obj).attr('dataId');
    $.ajax({
        type: "POST",
        data:{id:id},
        url: baseUrl+'/post/disLikeMe',
        async: false,
        success: function(data) {
            setFlashNotice('Bạn đã hủy thích một bài đăng','success');
            refeshLike($(obj));
        }
    });
}
function refeshLike(obj){
    var id = $(obj).attr('dataId');
    $.ajax({
        type: "POST",
        data:{id:id},
        url: baseUrl+'/post/renLikeButton',
        async: false,
        success: function(data) {
            $(obj).html(data);
            var $child = $(obj).find('button');
            $child.unwrap();
        }
    }); 
}
function visualButton(obj){
    var id = $(obj).attr('data-id-select');
    $( "#"+id).click();
}
function successIcon(){

}
function viewAllImgs(){
    console.log('success');
}
function resizeImage(){
    var hei = $('.slpBody').height();
    hei = Math.round(hei) - 70;

    $('.slpBody .item img').each(function(){

        var width = $(this).width();
        var height = $(this).height();
        var resize = Math.round(hei*width/height);
        if(resize !== 0 ){
            /*console.log(width);*/
            $(this).css('max-height',hei+'px');
            $(this).parent().css({'width':resize});
        }
    });
}

/* load content to myModal here */
function spam(obj){
    var id = $(obj).attr('dataId');
    var type = $(obj).attr('dataType');
    var html='';
    $.ajax({
        type: "GET",
        data: {id:id,type:type},
        url: baseUrl+'/index/spamReport',
        async: false,
        success: function(data) {
            $('#myModal .modal-header').addClass('red-bg').find('h4.modal-title').html('<i class="fa fa-warning"></i>Báo cáo vi phạm');
            $('#myModal .modal-body').html(data);
        }
    });

    $('#myModal').modal();
}
//process
function reportSpam(obj){
    var url = $(obj).attr('dataUrl');
    $.ajax({
        type: "POST",
        url: url,
        data: $(obj).serialize(),
        async: false,
        success: function(data) {
            $(obj).find('.btnPanel button').eq(0).prepend('<i class="fa fa-check-circle white" style="font-size:14px;margin:0px 5px"></i>');
            console.log('success');
        }
    });
    return false;
}
function hideThisPost(obj){
    var id = $(obj).attr('dataId');
    $.ajax({
        type: "POST",
        data: {id:id},
        url: baseUrl+'/post/hidePost',
        async: false,
        success: function(data) {
            $(obj).parents('.prodBox').remove();
        }
    });
    return false;
}
function cropImg(obj){
    var id = $(obj).attr('dataId');
    var html='';
    $.ajax({
        type: "GET",
        data: {id:id},
        url: baseUrl+'/index/cropImage',
        async: false,
        success: function(data) {
            $('#myModal .modal-header').addClass('blue-bg').find('h4.modal-title').html('<i class="fa fa-crop"></i> Cắt hình ảnh(267x240)');
            $('#myModal .modal-body').html(data);
        }
    });

    $('#myModal').modal();
}
function showLogin(){
    $('#loginModal').modal();
}