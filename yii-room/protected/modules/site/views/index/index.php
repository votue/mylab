<?php 
if(!empty($models)):
    foreach($models as $item): ?>
        <div class="span3">
            <?php $this->renderPartial('/elements/postElement',array('model'=>$item)) ?>
        </div>
    <?php endforeach ?>
<?php else: ?>
    <div class="row-fluid">
        <div class="prodBox">
            Chưa có bài đăng nào
        </div>
    </div>
<?php endif ?>