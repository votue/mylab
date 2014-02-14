<?php 
    //filter data null
    $user = array();
    if(isset($model->useRel)){
        $user = array(
            'beautyName'=>$model->useRel->BeautyName,
            'avaSrc'=>$model->useRel->AvaSrc
        );
    } else{
        $user = array(
            'beautyName'=>'Unknown',
            'avaSrc'=>Yii::app()->params['ava_dir'].'default.png'
        );
    }
?>

<div class="prodBox">
    <header class="headerProdBox">
        <img src="<?php echo $user['avaSrc'] ?>" width="30" height="30" />
        <h2><?php echo $user['beautyName'] ?></h2>
        <?php if(!Yii::app()->user->isGuest): ?>
            <a class="optPop" dataId="<?php echo $model->id ?>">
                <i class="fa fa-bars" style="font-size:16px;margin-top:3px"></i>
            </a>
        <?php endif ?>
        <h4>Chia sẻ công khai - <?php echo Yii::app()->utils->getTimeAgo($model->created) ?></h4>
        
    </header>
    <div class="bodyProdBox">
        <div class="prodwrap" onclick="javascript:location.href='<?php echo $this->createUrl('post/show',array('id'=>$model->id)) ?>'">
            <figure>
                <img class="product" src="<?php echo $model->ImgPost ?>" />
                <div class="loader_img"></div>
            </figure>
            <div class="bonus">
                <?php if(isset($model->extRel->promotion)): ?>
                    <div class="promotion"><?php echo $model->extRel->promotion ?> %</div>
                <?php endif ?>

                <?php if(isset($model->extRel->price)): ?>
                    <div class="price"><?php echo $model->extRel->price ?> VND</div>
                <?php endif ?>
            </div>
        </div>

        <h2><?php echo $model->name ?></h2>
        <div class="location">
            <span><?php echo $model->Taglist ?></span>
            <div class="mark"><?php echo $model->District ?></div>
        </div>
    </div>
    
    <footer class="footerProdBox">
        <button style="margin-left:10px" class="spacebtn cmtPop pull-left" dataPlace="top" dataId="<?php echo $model->id ?>"><?php echo $model->cmtCount ?> <i class="fa fa-comment-o"></i></button>
        <button class="spacebtn sharePopover pull-right" dataId="<?php echo $model->id ?>" dataType="<?php echo $model->cat_id ?>">12 <i class="fa fa-share-square-o"></i></button>
        <?php $this->renderPartial('/elements/_likeRender',array('type'=>'post','model'=>$model)) ?> 
    </footer>
</div>