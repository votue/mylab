<div class="cpanel">
    <div class="logo">
        <a href="/"><img src="<?php echo Yii::app()->themeManager->baseUrl?>/images/logo.png" /></a>
    </div>
</div>
<!-- Start .notifications -->
<?php $this->widget('widgets.admin.notifications'); ?>
<!-- End .notifications -->

<div id="content"> 
    <div id="welcome-buzzer">
        <h1>Welcome</h1>
        <div class="head-welcome"></div>
        <div class="content-welcome">
            <?php echo CHtml::form($this->createUrl('register/index', array('lang'=>Yii::app()->language)), 'post', array('class'=>'form-horizontal', 'id'=>'validation2', 'enctype'=>'multipart/form-data')); ?>
                <?php echo CHtml::activeHiddenField($model,'email'); ?>
                <fieldset class="control-group">
                    <?php echo CHtml::activeLabel($model, 'Password:'); ?>
                    <div class="controls">
                      <?php echo CHtml::activePasswordField($model, 'password', array('id'=>'inputPassword','class' => 'validate[required,minSize[3]]','placeholder'=>'password','required'=>'required', 'title' => Yii::t('register', 'Enter your password') )); ?>
                    </div>
                    <?php echo CHtml::error($model, 'password'); ?>  
                </fieldset>
                <fieldset class="control-group">
                    <?php echo CHtml::activeLabel($model, 'Re-password:'); ?> 
                    <div class="controls">
                        <?php echo CHtml::activePasswordField($model, 'password2', array('id'=>'inputPassword','class' => 'validate[required,equals[RegisterForm_password]','placeholder'=>'password','required'=>'required', 'title' => Yii::t('register', 'Repeat Your Password') )); ?>
                    </div>
                    <?php echo CHtml::error($model, 'password', array( 'class' => 'span5 offset5' )); ?>
                </fieldset>
                <fieldset class="control-group"> 
                    <label>
                        If you press save, you accept the curent,&nbsp;&nbsp;&nbsp;
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" required="required"/> 
                        <u>
                            <a href="#" onclick="javascript:void window.open('/terms-and-conditions','1369277249056','width=800,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=300,top=100');return false;" style="color: white;">
                                TERMS & CONDITIONS&nbsp;&nbsp;&nbsp;
                            </a>
                        </u>
                    </label>
                    
                    <label class="checkbox">
                        <input type="checkbox" name="newsletter"> <u>NEWSLETTER</u>
                    </label>
                    
                </fieldset>
                <hr></hr>
                <fieldset class="control-group"> 
                    <?php echo CHtml::submitButton(Yii::t('global', 'SAVE'), array('class'=>'btn submitButton','type'=>'submit')); ?>
                </fieldset>
        <?php echo CHtml::endForm(); ?>
        </div>
        <div class="footer-welcome"></div>
        
    </div>
</div><!--end content -->
<div class="clearfix"></div>
