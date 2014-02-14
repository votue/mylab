<ul class="options">
    <?php if(!$type): ?>
        <li class="spamPop" onclick="spam(this)" dataId="<?php echo $model->id ?>" dataType="<?php echo Report::TYPE_POST ?>">Báo cáo spam</li>
    <?php else: ?>
        <li onclick="location.href='<?php echo $this->createUrl('/post/update',array('id'=>$model->id)) ?>'">Chỉnh sửa</li>  
    	<?php if(isset($model->albRel->imgChekRel->id)): ?>
    		<li onclick="cropImg(this)" dataId="<?php echo $model->albRel->imgChekRel->id ?>">Resize ảnh</li>
    	<?php endif ?>
    	<li onclick="hideThisPost(this)" dataId="<?php echo $model->id ?>">Ẩn bài đăng</li>
    <?php endif ?>
</ul>
