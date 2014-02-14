<div class="cpanel">
    <?php $this->renderPartial('/elements/user_buttons'); ?>
</div><!--end logo -->

<div id="content"> 
    <div id="welcome-buzzer">
        <h1>Login</h1>
        <div class="head-welcome"></div>
        <div class="content-welcome">
            <?php echo CHtml::form($this->createUrl('login/index'), 'post', array('class'=>'form-horizontal', 'id'=>'validation2')); ?>
                <fieldset class="control-group">
                    <?php echo CHtml::activeLabel($model,'email',array('class'=>'control-label','for'=>'inputEmail')); ?>
                    <div class="controls">
                        <?php echo CHtml::activeTextField($model, 'email', array( 'id'=>'inputEmail','class' => 'validate[required]','placeholder'=>'Email','title' => Yii::t('global', 'Please enter your name') )); ?>
                    </div>
                    <?php echo CHtml::error($model, 'email', array( 'class' => 'redDark' )); ?>
                </fieldset>
                <fieldset class="control-group">
                    <?php echo CHtml::activeLabel($model,'Password',array('class'=>'control-label','for'=>'inputPassword')); ?>
                    <div class="controls">
                        <?php echo CHtml::activePasswordField($model, 'password', array('id'=>'inputPassword' ,'class' => 'validate[required]','style'=>'width: 206px;','placeholder'=>'Password','title' => Yii::t('global', 'Please enter your password') )); ?>
                    </div>
                    <?php echo CHtml::error($model, 'password', array( 'class' => 'redDark' )); ?>
                </fieldset>

                <div class="clearfix" style="margin-bottom:20px">
                    <?php echo CHtml::link( Yii::t('login', 'Forgot password?'), array('lostpassword'), array('id'=>'forgot','style'=>'margin-right:88px') ); ?>
                    <button type="button" class="sociBtt facebookModal left" onClick="location.href='<?php echo $this->createUrl('/login?provider=facebook'); ?>'" style="border:none">Facebook</button>
                    <button type="button" class="sociBtt google left" onClick="location.href='<?php echo $this->createUrl('/login?provider=google'); ?>'" style="border:none">Google</button>
                    <button type="button" class="sociBtt twitter left" onClick="location.href='<?php echo $this->createUrl('/login?provider=twitter'); ?>'" style="border:none">Twitter</button>
                </div>
                
                <hr></hr>
                <fieldset class="control-group"> 
                    <?php echo CHtml::submitButton(Yii::t('global', 'Login'), array('name'=>'submit','type'=>'submit', 'class'=>'buttonLogin blue')); ?>
                </fieldset>
            <?php echo CHtml::endForm(); ?>
        </div>
        <div class="footer-welcome"></div>
        
    </div>
</div><!--end content -->
<div class="clearfix"></div>

