<style type="text/css">
body #myModal {
    margin-left: -420px;
    max-height: 500px;
    overflow: auto;
    width: 840px;
}
.pareReview{
    margin-left:30px;
    float: left;
    position: relative;
    overflow: hidden;
    width: 269px !important;
    height: 242px !important;
}
.pareReview .review{
    max-width:none;
}
</style>
<div class="row-fluid">
    <div class="span6">
        <img id="insImg" src="<?php echo Yii::app()->params['imgs_dir'].$model->file ?>" width="465"/>
    </div>
    <div class="pareReview span6">
        <img class="review" src="<?php echo Yii::app()->params['imgs_dir'].$model->file ?>" width="465" style="position: relative;" />
    </div>
</div>
<form id="coords" style="clear:both;margin-top:20px" method="post" onsubmit="return validateCoords(this);">
    <input id="x1" name="x1" type="hidden" />
    <input id="y1" name="y1" type="hidden" />
    <input id="w" name="w" type="hidden" />
    <input id="h" name="h" type="hidden" />
    <input name="m" type="hidden" />
    
    <input name="filename" class="image_input_name" value="<?php //echo $filename?>" type="hidden" />
    <input name="type" value="label" type="hidden" />
    <div class="row-fluid btnPanel" style="text-align:right;margin:20px 0px">
        <input type="submit" value="Cắt ảnh" class="sicBtt blueBtn rightBtn"/>
        <button class="sicBtt rightBtn" onclick="$('#myModal .close').click();turnOff();">Hủy</button>
    </div>
</form>

<script>
    var img_real_width=0,
        img_real_height=0,
        imgObj;
    $(document).ready(function(){
    	
        var is_img = $('#insImg').imgAreaSelect({ 
            aspectRatio: '269:242',
            instance: true, 
            onSelectChange: preview,
            onSelectEnd: function (img, selection) {
                var scaleX = img_real_width/img.width;
                var scaleY = img_real_height/img.height;

                $('#coords #x1').val(Math.round(scaleX * selection.x1));
                $('#coords #y1').val(Math.round(scaleY * selection.y1));
                $('#coords #w').val(Math.round(scaleX * selection.width));
                $('#coords #h').val(Math.round(scaleY * selection.height));            
            },
            instance: true,
        });
        imgObj = is_img;
        $("#insImg").load(function(){
            var img2 = new Image();
            img2.src = $(this).attr('src');
            
            img_real_width = img2.width;
            img_real_height = img2.height;
       });
    });


    function preview(img, selection) {
        var scaleX = 269 / (selection.width || 1);
        var scaleY = 242 / (selection.height || 1);
        $('#myModal .review').css({
            width: Math.round(scaleX * img.width) + 'px',
            height: Math.round(scaleY * img.height) + 'px',
            marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
            marginTop: '-' + Math.round(scaleY * selection.y1) + 'px',
        });
    }

    // Validate form data
    function validateCoords(obj) {
        if ( $('#x1').val() == '' || $('#y1').val() == '' || $('#x2').val() == '' || $('#y2').val() == '' ){
            alert('Please make a selection first!');
            return false;
        }     
        //turnOff();
        //$('#audioCreateForm .popup-content').html('<div class="videoLoading"></div>');
        $.ajax({
            type: "POST",
            async: false, 
            data: $(obj).serialize(),
            url: '<?php echo Yii::app()->createUrl("sicImage/crop",array("id"=>$model->id)) ?>',
            success: function(data) {
                console.log('success');
            },
            error: function() {
                console.log('failed');
            }
        });
        
        return false;
    };

    /*function turnOff(){
        if(typeof imgObj !== 'undefined'){
            imgObj.setOptions( {
                hide: true,
            });
            imgObj.update();
        }
    }*/
</script>