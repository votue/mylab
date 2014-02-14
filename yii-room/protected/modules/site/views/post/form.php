<?php
    $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'createPostForm',
            'htmlOptions' => array(/*'onsubmit'=>'return usrSubmitBasic(this)'*/),
        )
    );
?>
<div class="row-fluid">
    <!-- POST -->
    <div class="span5 pull-right" style="margin-right: 6.1111%;">
        <div class="row-fluid">
            <?php $this->renderPartial('_sub_post',compact('form','model')) ?>
        </div> 
        <div class="row-fluid">
            <?php $this->renderPartial('_extend-post',compact('form','extend')) ?>
        </div>
        <!-- EXTEND POST -->
        <div class="row-fluid" style="text-align:right;margin-bottom:20px">
            <?php $submitText = ($model->isNewRecord)?'Chia sẽ':'Chỉnh sửa' ?>
            <button class="sicBtt blueBtn rightBtn"><?php echo $submitText ?></button>
            <button class="sicBtt rightBtn">Hủy</button>
        </div>
    </div>
    
    <div class="span5 offset1 pull-left">
        <div class="row-fluid">
            <?php $this->renderPartial('_main_post',compact('form','model')) ?>
        </div>     
        <?php $this->endWidget();
        unset($form); ?>

        <div class="row-fluid">
            <?php $this->renderPartial('_image-post',compact('model')) ?>
        </div>
    </div>
</div>
