<div class="itemContWall">
    <img src="<?php echo $model->UseRel->AvaSrc ?>"/>
    <div class="mainItemContWall pull-left">
        <div style="margin-top: 4px">
            <p class="styBold"><?php echo $model->UseRel->BeautyName ?></p>
            <p class="dateContWall"><?php echo date('H:m d-m-Y',strtotime($model->created)) ?></p>
        </div>
        <a class="styFade" style="font-size: 11px;">trả lời  <i class="fa fa-flag-o"></i></a>
        <div class="clearfix"></div>
        <p>
            <span style="font-size: 1em;padding:0px"><?php echo $model->content ?></span>
            <?php if($model->checkMySelf()): ?>
                <a onclick="showEditCmt(this)" href="javascript:void(0)" class="editCmt fa fa-pencil-square" dataId="<?php echo $model->id ?>"></a>
                <a onclick="delCmt(this)" href="javascript:void(0)" class="editCmt fa fa-times red" dataId="<?php echo $model->id ?>"></a>
            <?php endif ?>
        </p>
        <form class="miniEditCmt" onsubmit="editCmt(this);return false;" dataId="<?php echo $model->id ?>" style="display:none">
            <input type="text" name="conCmt" value="<?php echo $model->content ?>"/>
        </form>
    </div>
</div>