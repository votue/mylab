<div class="cpanel">
    <?php $this->renderPartial('/elements/user_buttons'); ?>
</div><!--end logo -->
<!-- Start .notifications -->
<?php $this->widget('widgets.admin.notifications'); ?>
<!-- End .notifications -->
<div id="content"> 
    <div id="welcome-buzzer">
        <h1>Change Your Password</h1>
        <div class="head-welcome"></div>
        <div class="content-welcome">
            <?php echo CHtml::form($this->createUrl('users/changepass'), 'post', array('class'=>'form-horizontal', 'id'=>'validation2')); ?>
                <fieldset class="control-group">
                    <?php echo CHtml::activeLabel($password,'Old Password:',array('class'=>'control-label','for'=>'oldPassword')); ?>
                    <div class="controls">
                        <?php echo CHtml::activePasswordField($password, 'password', array( 'id'=>'oldPassword','class' => 'validate[required,minSize[3]]','placeholder'=>'Old Password','title' => Yii::t('global', 'Enter your Old Password') )); ?>
                    </div>
                    <?php echo CHtml::error($password, 'password', array( 'class' => 'redDark' )); ?>
                </fieldset>

                <fieldset class="control-group">
                    <?php echo CHtml::activeLabel($password,'New Password:',array('class'=>'control-label','for'=>'newPassword')); ?>
                    <div class="controls">
                        <?php echo CHtml::activePasswordField($password, 'npassword', array('id'=>'newPassword' ,'maxlength'=>'255','required'=>'required','minlength'=>'6','class' => 'validate[required,minSize[3]]','placeholder'=>'New Password','title' => Yii::t('global', 'Enter New Password') )); ?>
                    </div>
                    <?php echo CHtml::error($password, 'npassword', array( 'class' => 'redDark' )); ?>
                </fieldset>

                <fieldset class="control-group">
                    <?php echo CHtml::activeLabel($password,'Confirm New Password:',array('class'=>'control-label','for'=>'confirmPassword')); ?>
                    <div class="controls">
                        <?php echo CHtml::activePasswordField($password, 'npassword2', array('id'=>'confirmPassword' ,'maxlength'=>'255','required'=>'required','minlength'=>'6','class' => 'validate[required,equals[PasswordForm_npassword]','placeholder'=>'Confirm New Password','title' => Yii::t('global', 'Enter New Password Again') )); ?>
                    </div>
                    <?php echo CHtml::error($password, 'npassword2', array( 'class' => 'redDark' )); ?>
                </fieldset>

                <hr></hr>
                <fieldset class="control-group"> 
                    <?php echo CHtml::submitButton(Yii::t('global', 'Change Password'), array('name'=>'submit','type'=>'submit', 'class'=>'buttonLogin blue')); ?>
                </fieldset>
            <?php echo CHtml::endForm(); ?>
        </div>
        <div class="footer-welcome"></div>
    </div>
</div>
<div class="clearfix"></div>
