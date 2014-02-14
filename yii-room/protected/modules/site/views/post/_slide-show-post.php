<div class="slpHeader">
    <div class="pull-left">
        <h1><?php echo isset($model->albRel->name)?$model->albRel->name:''?></h1>
        <h3 class="lightGray"><?php echo $model->Taglist ?></h3>
    </div>
    <div class="pull-right">
        <?php if(isset($model->extRel->price)): ?>
            <h1 class="pull-right highlight"><i class="fa fa-money" style="margin-right: 3px;font-size:14px"></i><?php echo $model->extRel->price ?> vnd</h1>
        <?php endif ?>

        <?php if(isset($model->extRel->promotion)): ?>
            <h1 class="pull-right highlight"><?php echo $model->extRel->promotion ?>%</h1>
        <?php endif ?>
        <h4 class="lightGray sharePopover" datatype="<?php echo $model->catRel->id ?>" dataid="<?php echo $model->id ?>">Chia sẽ</h4>
    </div>
</div>
<div class="slpBody">
    <ul class="bxslider">
        <?php if(isset($model->albRel->imgRel)): ?>
            <?php foreach($model->albRel->imgRel as $key => $item): ?>
                <li class="item">
                    <figure>
                        <img src="<?php echo $item->src ?>" alt="<?php echo isset($item->caption)?$item->caption:'' ?>" />
                        <?php if(isset($item->caption)): ?>
                            <p><small><?php echo $item->caption ?></small><small style="float:right"><?php echo $key ?>/<?php echo count($model->albRel->imgRel) ?></small></p>
                        <?php endif ?>
                        <div class="loader_img"></div>
                    </figure>     
                </li>
            <?php endforeach ?>
        <?php endif ?>
    </ul>
</div>
<div class="slpFooter">
    <div class="bx-pager">
        <?php if(isset($model->albRel->imgRel)): ?>
            <?php foreach($model->albRel->imgRel as $key => $item): ?>
                <a data-slide-index="<?php echo $key ?>" href="#">
                    <figure>
                        <img width="100px" src="<?php echo $item->src ?>" />
                        <div class="loader_img"></div>
                    </figure>
                </a>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        resizeImage();
    })

    $( window ).resize(function() {
        resizeImage();
    });

    /* custom position of popover */
    $('.sharePopover').on('shown.bs.popover', function () {
        $('.popover').css('top',14);
        $('.arrow').css('top',10);
    })
</script>
