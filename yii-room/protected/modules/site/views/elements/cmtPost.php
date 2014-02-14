<div class="wrapComment">
    <div class="allCmt">
        <?php if(!empty($model->cmtRel)){
            foreach($model->cmtRel as $item){
                echo $this->renderPartial('/elements/cmtBox',array('model'=>$item));
            }
        } ?>
    </div>
    <div class="cmtInput">
        <?php $submit = (!Yii::app()->user->isGuest)?'addCmtPost(this);return false;':'showLogin();return false;'; ?>
        <form onsubmit="<?php echo $submit ?>" dataId="<?php echo $model->id ?>" style="padding:4px 10px;margin:5px 0px;">
            <input class="cmtCont" type="text" style="width:100%" name="Comment[content]" placeholder="Thêm nhận xét" />
            <input type="hidden" name="Comment[type]" value="<?php echo Comment::TYPE_POST ?>" />
            <div class="panelBnt">
                <input type="submit" class="sicBtt blueBtn rightBtn" value="Đăng nhận xét"/>
                <button type="button" class="sicBtt leftBtn" onclick="closePop(this)">Hủy</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    /* custom position of popover */
    /*$('.cmtPop').on('shown.bs.popover', function () {
        $(this).next().css({'margin-top':'-130px'});
        $(this).next().find('.arrow').css({'margin-top':'120px'});
    })*/
})    
</script>