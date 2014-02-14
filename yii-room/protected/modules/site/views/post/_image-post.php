<style type="text/css">
    #SicImage-form{
        height:60px;
    }
</style>
<div class="row-fluid">
    <div class="stdForm">
        <div class="beauty"></div>
        <div class="row-fluid">
            <?php 
                if(empty($model->albRel))
                    $model->albRel = new Album;
            ?>
            <div class="input-prepend" style="width:75%">
                <span class="add-on"><i class="icon-sic-rename"></i></span>
                <?php echo CHtml::activeTextField($model->albRel, 'name', array('class'=>'span11','placeholder'=>'+Đặt tên album')) ?>
            </div>
            
            <?php $image = new SicImage ?> 
            <?php 
                $this->widget('bootstrap.widgets.TbFileUpload', array(
                    'url' => $this->createUrl("/post/uploadTemp"),
                    'formView'=>'bootstrap.views.fileupload._templateUpload',
                    'downloadView'=>'bootstrap.views.fileupload._templateDownload',
                    'uploadView'=>'bootstrap.views.fileupload._templateReview',
                    'id'=>'postUpload',
                    'model' => $image,
                    'attribute' => 'file', 
                    'multiple' => true,
                    'options' => array(
                        'sequentialUploads'=>true,
                        'maxFileSize' => 2000000,
                        'acceptFileTypes' => 'js:/(\.|\/)(gif|jpe?g|png)$/i',
                    ),
                    'htmlOptions'=>array('style'=>'overflow:hidden')
                )); 
            ?>
        </div>
        <div class="row-fluid tmpBox">
            <?php if(!empty(Yii::app()->session['tmpImage']) && $listImgs = Yii::app()->utils->checkPathTempImg(Yii::app()->session['tmpImage'])): ?>
                <?php $this->renderPartial('/smallpiece/tmpBox',array('listImgs'=>$listImgs)) ?>
                <?php Yii::app()->session['tmpImage'] = implode(',', $listImgs) ?>
            <?php endif ?>
        </div>
        
        <?php if(!empty($model->albRel->imgRel)): ?>
            <div class="row-fluid simBox">
                <?php $this->renderPartial('/smallpiece/simBox',array('model' => $model->albRel->imgRel)) ?>
            </div>
        <?php endif ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#SicImage-form').bind('fileuploadadd', function (e, data) { data.submit(); })
                            .bind('fileuploaddone', function (e, data) { refeshTmpBox(); });
    })
</script>