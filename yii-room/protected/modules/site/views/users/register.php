<div class="cpanel">
    <?php $this->renderPartial('/elements/user_buttons'); ?>
</div><!--end logo -->

<!-- Start .notifications -->
<?php $this->widget('widgets.admin.notifications'); ?>
<!-- End .notifications -->

<div id="content"> 
    <div id="welcome-buzzer">
        <h1>Register</h1>
        <div class="head-welcome"></div>
        <div class="content-welcome">
            <?php echo CHtml::form($this->createUrl('register/index'), 'post', array('class'=>'form-horizontal', 'id'=>'validation2')); ?>
                <fieldset class="control-group">
                    <?php echo CHtml::activeLabel($model,'email',array('class'=>'control-label','for'=>'inputEmail')); ?>
                    <div class="controls">
                        <?php echo CHtml::activeTextField($model, 'email', array( 'id'=>'inputEmail','class' => 'validate[required] span4','required'=>'required','placeholder'=>'Email','title' => Yii::t('global', 'Please enter your name') )); ?>
                    </div>
                    <?php echo CHtml::error($model, 'email', array( 'class' => 'redDark' )); ?>
                </fieldset>
                <div class="clearfix" style="margin:0px 0px 20px 179px">
                    <button type="button" class="sociBtt facebookModal left" onClick="location.href='<?php echo $this->createUrl('/login?provider=facebook'); ?>'" style="border:none">Facebook</button>
                    <button type="button" class="sociBtt google left" onClick="location.href='<?php echo $this->createUrl('/login?provider=google'); ?>'" style="border:none">Google</button>
                    <button type="button" class="sociBtt twitter left" onClick="location.href='<?php echo $this->createUrl('/login?provider=twitter'); ?>'" style="border:none">Twitter</button>
                </div>
                
                <hr></hr>
                <fieldset class="control-group"> 
                    <?php echo CHtml::submitButton('Send', array('name'=>'submit','type'=>'submit', 'class'=>'buttonLogin blue')); ?>
                </fieldset>
            <?php echo CHtml::endForm(); ?>
        </div>
        <div class="footer-welcome"></div>
        
    </div>
</div><!--end content -->
<div class="clearfix"></div>
