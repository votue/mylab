
<div class="page-header">
    <h1><?php echo $label; ?><small> <?php echo $model->username; ?></small></h1>
</div>

<!-- Start .notifications -->
<?php $this->widget('widgets.admin.notifications'); ?>
<!-- End .notifications -->

 <div class="row-fluid">
    <div class="span12">                    
        <div class="head clearfix">
            <div class="isw-grid"></div>
            <h1><?php echo $label; ?></h1>                       
        </div>
        <div class="block-fluid">
            <?php echo CHtml::form(); ?>
                
                <div class="row-form clearfix">
                    <div class="span3">
                        <?php echo CHtml::activeLabel($model, 'username'); ?>
                    </div>
                    <div class="span7">
                        <?php echo CHtml::activeTextField($model, 'username', array( 'class' => 'text-input medium-input' )); ?>
                    </div>
                    <div class="span2">
                        <?php echo CHtml::error($model, 'username', array( 'class' => 'input-notification errorshow png_bg' )); ?>
                    </div>
                </div>
                
                <div class="row-form clearfix">
                    <div class="span3">
                        <?php echo CHtml::activeLabel($model, 'email'); ?>
                    </div>
                    <div class="span7">
                        <?php echo CHtml::activeTextField($model, 'email', array( 'class' => 'text-input medium-input' )); ?>
                    </div>
                    <div class="span2">
                        <?php echo CHtml::error($model, 'email', array( 'class' => 'input-notification errorshow png_bg' )); ?>
                    </div>
                </div>
                <div class="row-form clearfix">
                    <div class="span3">
                        <?php echo CHtml::activeLabel($model, 'package');?>
                    </div>
                    <div class="span7">
                        <?php echo CHtml::activeDropDownList($model, 'package_id',Chtml::listData(Packages::model()->findAll(),'id','name') ,array( 'class' => 'text-input medium-input' )); ?>
                    </div>
                    <div class="span2">
                        <?php echo CHtml::error($model, 'package', array( 'class' => 'input-notification errorshow png_bg' )); ?>
                    </div>
                </div>
                
                <div class="footer tar">
                    <?php echo CHtml::submitButton(Yii::t('adminglobal', 'Submit'), array( 'name' => 'submit', 'class'=>'btn')); ?>
                </div>
            <?php echo CHtml::endForm(); ?>
                <!-- list board here -->
                <div class="row-form clearfix">
                    <a style="margin:10px 0px" href="<?php echo $this->createUrl('board/addwithuser', array('id'=> $model->id)); ?>" class="btn" data-original-title="<?php echo Yii::t('board', 'Add A Board'); ?>">Add Board</a>
                </div>
                <div class="row-form clearfix" style="padding:0px">
                    <?php $this->renderPartial('/elements/_boardList',compact('sort','rows')) ?>
                </div>

                <!-- end list-->
                
                
            
        </div>
    </div>                                
</div>