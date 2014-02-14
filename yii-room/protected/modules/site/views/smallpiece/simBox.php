<?php foreach($model as $item): ?>
    <?php $this->renderPartial('/smallpiece/aImage',array('type'=>'model','model'=>$item,'path'=>Yii::app()->params['imgs_dir'])) ?>
<?php endforeach ?>
