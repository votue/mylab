<?php foreach($listImgs as $item): ?>
    <?php $this->renderPartial('/smallpiece/aImage',array('type'=>'tmp','model'=>$item,'path'=>Yii::app()->params['asset_dir'])) ?>
<?php endforeach ?>	