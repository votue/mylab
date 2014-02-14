<?php 
    //filter data null
    $user = array();
    if(isset($model->useRel)){
        $user = array(
            'beautyName'=>$model->useRel->BeautyName,
            'avaSrc'=>$model->useRel->getAvaSrc(array('width'=>64,'height'=>64))
        );
    } else{
        $user = array(
            'beautyName'=>'Unknown',
            'avaSrc'=>Yii::app()->params['ava_dir'].'default.png'
        );
    }
?>

<div class="psHeader">
    <img src="<?php echo $user['avaSrc'] ?>" width="64"/>
    <h2><?php echo $user['beautyName'] ?></h2>
    <h4 class="lessGray">Chia sẻ công khai - <?php echo Yii::app()->utils->getTimeAgo($model->created) ?></h4>
    <h4 class="moreGray"><i class="fa fa-map-marker"></i><?php echo $model->District ?></h4>
</div>

<?php if(!empty($model->description)): ?>
    <div class="psDes">
        <h3>Giới thiệu:</h3>
        <p class="lessGray"><?php echo $model->description ?></p>
    </div>
<?php endif ?>

<?php if(!empty($model->website)): ?>
    <div class="psLink">
        <h3>Liên kết:</h3>
        <a href="<?php echo $model->website ?>"><?php echo $model->website ?></a>
    </div>
<?php endif ?>
<div style="margin:0px 20px">
    <?php $this->renderPartial('/elements/cmtPost',array('model'=>$model)); ?>
</div>