<?php
    $imgFolder = Yii::getPathOfAlias("webroot").Yii::app()->params['imgs_dir'];
    $assetFolder = Yii::getPathOfAlias("webroot").Yii::app()->params['asset_dir'];
?>

<?php if(isset($type) && $type == 'tmp' && Yii::app()->utils->checkExistAFile($model,$assetFolder)): ?>
    <div class="span4" >
        <div class="thum-img-tmp" data-sic-name="<?php echo $model ?>">
            
            <?php $src = Yii::app()->EasyImage->thumbSrcOf(
                        $path.$model, 
                        array('resize' => array('width' => 136))); ?>
            <img src="<?php echo $src ?>" alt="temp file"/>
            <div class="delImgTmp" onclick="delImgTmp(this,'tmp')" data-sic-name="<?php echo $model ?>">X</div>
        </div>
        <div class="caption">
            <input type="text" name="caption[<?php echo $model ?>]" placeholder="Đặt tên ảnh" />
        </div>
    </div>
<?php elseif($type == 'model' && Yii::app()->utils->checkExistAFile($model->file,$imgFolder)): ?>
    <div class="span4">
        <div class="thum-img-tmp" data-sic-name="<?php echo isset($model->file)?$model->file:'' ?>">
            <?php $src = Yii::app()->EasyImage->thumbSrcOf(
                        $path.$model->file, 
                        array('resize' => array('width' => 136))); ?>
            <img src="<?php echo $src ?>" alt="temp file"/>
            <div class="aImg">
                <a class="setImgPop" dataId="<?php echo $model->id ?>">
                    <i class="fa fa-gear" style="margin: 4px;width: 10px;display:block;float:right"></i>
                </a>
            </div>
            <?php if($model->check == SicImage::CHOICE): ?>
                <i class="fa fa-check-square-o" style="position:absolute;margin:4px;top:0px;left:0px"></i>
            <?php endif ?>
        </div>
        <form method="post" onsubmit="editCaption(this);return false;" dataId="<?php echo $model->id ?>">
            <input type="text" name="SicImage[caption]" value="<?php echo isset($model->caption)?$model->caption:'' ?>" placeholder="Đặt tên ảnh" />
        </form>
    </div>
<?php endif ?>