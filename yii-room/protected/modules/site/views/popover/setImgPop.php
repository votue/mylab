<ul class="imgOpt options">
    <li onclick="cropImg(this)" dataId="<?php echo $model->id ?>"><i class="fa fa-crop"></i>Resize ảnh</li>
    <li onclick="selectCheck(this)" dataId="<?php echo $model->id ?>"><i class="fa fa-check-square-o"></i>Chọn làm ảnh đại diện</li>
    <li onclick="delImgTmp(this,'img')" data-sicimage-id="<?php echo $model->id ?>"><i class="fa fa-ban"></i>Xóa ảnh</li>
</ul>
