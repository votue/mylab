<div class="cpanel">
    <?php $this->renderPartial('/elements/user_buttons'); ?>
</div>
<!-- Start .notifications -->
<?php $this->widget('widgets.admin.notifications'); ?>
<!-- End .notifications -->
<div id="content"> 
    <div id="welcome-buzzer">
        <h1>Reset Your Password</h1>
        <div class="head-welcome"></div>
        <div class="content-welcome">
            <div class="row" style="color:#aaa;padding-bottom:20px">
                <p><?php echo Yii::t('login', 'Please fill all required fields and hit the submit button once your done.'); ?></p>
                <p><?php echo Yii::t('login', 'You will receive an email with a password reset link that you will need to click in order to complete the password reset process.'); ?></p>
            </div>
            <?php echo CHtml::form($this->createUrl('users/lostpassword'), 'post', array('class'=>'form-horizontal', 'id'=>'validation2')); ?>
                <fieldset class="control-group">
                    <?php echo CHtml::activeLabel($model,'email',array('class'=>'control-label','for'=>'inputEmail')); ?>
                    <div class="controls">
                        <?php echo CHtml::activeTextField($model, 'email', array( 'id'=>'inputEmail','class' => 'validate[required]','placeholder'=>'Max.Mustermann@gmail.com','title' => Yii::t('global', 'Enter your desired email address') )); ?>
                    </div>
                    <?php echo CHtml::error($model, 'email', array( 'class' => 'redDark' )); ?>
                </fieldset>
                <fieldset class="control-group">
                    <?php echo CHtml::activeLabel($model,'VerifyCode:',array('class'=>'control-label','for'=>'VerifyCode')); ?>
                    <div class="controls">
                        <?php echo CHtml::activeTextField($model, 'verifyCode', array('id'=>'VerifyCode' ,'class' => 'validate[required]','title' => Yii::t('global', 'Enter the text displayed in the image below') )); ?>
                    </div>
                    <?php echo CHtml::error($model, 'verifyCode', array( 'class' => 'redDark' )); ?>
                </fieldset>
                <div class="clearfix"></div>

                <div class="row offset2" style="margin-bottom:30px">
                    <?php $this->widget('CCaptcha', array('buttonLabel'=>'Get a new code', 'buttonOptions'=>array('class'=>'btnRefresh', 'title'=>'Get a new code', 'style'=>'margin-left:5px'))); ?>
                </div>
                <hr></hr>
                <fieldset class="control-group"> 
                    <?php echo CHtml::submitButton(Yii::t('global', 'Submit'), array('name'=>'submit','type'=>'submit', 'class'=>'buttonLogin blue')); ?>
                </fieldset>
            <?php echo CHtml::endForm(); ?>
        </div>
        <div class="footer-welcome"></div>
        
    </div>
</div><!--end content -->
<div class="clearfix"></div>
<!--
<section>
    <div id="wrapContent" class="">  
        <div id="mainContent" >
            <div class="buzzBox row-fluid">
                <div id="buzzDivheard"class="center clearfix">
                    <small id="buzzheard">Reset Your Password</small>
                    <div class="right">
                        
                    </div>
                </div>
                <div class="row offset1" style="color:#999; padding-top:50px;">
                	<p><?php echo Yii::t('login', 'Please fill all required fields and hit the submit button once your done.'); ?></p>
                	<p><?php echo Yii::t('login', 'You will receive an email with a password reset link that you will need to click in order to complete the password reset process.'); ?></p>
                </div>
                <div class="span9 offset1 center">
                	
                		<?php if($model->hasErrors()): ?>
                			<p class="row redDark offset3">
                				<?php echo Yii::t('login', 'Please fix the following input errors.'); //CHtml::errorSummary($model); ?>
                			</p>
                		<?php endif; ?>
       	
                        <fieldset class="row">
                            <?php echo CHtml::activeLabel($model, '<h3>Email:</h3>',array('class'=>'span3 textleft')); ?>
                            <?php echo CHtml::activeTextField($model, 'email', array( 'class' => 'span4 validate[required,custom[email]]','placeholder'=>'Max.Mustermann@gmail.com', 'size'=>50, 'style'=>'margin-top:16px', 'title' => Yii::t('login', 'Enter your desired email address') )); ?>
                            <?php echo CHtml::error($model, 'email', array( 'class' => 'span5 offset3 redDark textleft' )); ?>  
                        </fieldset>
                	
                        <fieldset class="row">
                            <?php echo CHtml::activeLabel($model,'<h3>VerifyCode:</h3>',array('class'=>'span3 textleft')); ?>
                            <?php echo CHtml::activeTextField($model, 'verifyCode', array( 'class' => 'span4 validate[required]','style'=>'margin-top:16px', 'title' => Yii::t('login', 'Enter the text displayed in the image below') )); ?>
                			<?php echo CHtml::error($model, 'verifyCode', array( 'class' => 'span5 offset3 redDark textleft' )); ?>
                        </fieldset>
                        <div class="clearfix"></div>
                        <div class="row offset2" style="margin-bottom:30px">
                            <?php $this->widget('CCaptcha', array('buttonLabel'=>'Get a new code', 'buttonOptions'=>array('class'=>'btnRefresh', 'title'=>'Get a new code', 'style'=>'margin-left:5px'))); ?>
                        </div>
                        <div class="divSubmit" style="margin-left:227px">
                            <?php echo CHtml::submitButton(Yii::t('global', 'Submit'), array('name'=>'submit', 'class'=>'submitButton')); ?>
                            <img class="submitImg" src="<?php echo Yii::app()->themeManager->baseUrl.'/images/checkSmall.png' ?>"/>                      
                        </div>
                		
                	<?php echo CHtml::endForm(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
-->