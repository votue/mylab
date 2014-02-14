<?php if(Yii::app()->user->isGuest): ?>
    <div class="user pull-right">
        <!-- isguest -->
        <?php 
            $model = new LoginForm;
            $form = $this->beginWidget(
                'bootstrap.widgets.TbActiveForm',
                array(
                    'id' => 'loginForm',
                    'action'=>Yii::app()->createUrl('user/login'),
                    'method'=>'post',
                    'htmlOptions' => array('class'=>'row-fluid'),
                )
            );
         
                echo $form->textField($model, 'username',array('class' => 'span3','placeholder'=>'username'));
                echo $form->passwordField($model, 'password',array('class' => 'span3','placeholder'=>'password'));
                echo $form->checkbox($model, 'rememberMe');
                
                $this->widget(
                    'bootstrap.widgets.TbButton',
                    array('buttonType' => 'submit', 'label' => 'Đăng nhập','htmlOptions' => array('class'=>'btn-info'))
                );
                
                $this->widget(
                    'bootstrap.widgets.TbButton',
                    array('buttonType' => 'button', 'label' => 'Đăng kí','htmlOptions' => array('class'=>'btn-info','style'=>'margin-left:10px','onclick'=>'location.href="'.$this->createUrl('user/register').'"'))
                );
             	
            $this->endWidget();
        ?> 
    </div>   
<?php else: ?>
    <div class="user pull-right" style="margin-right:16px">
        <!-- isuser -->
        <small><?php echo Yii::app()->user->getName() ?> </small>
        <a href="<?php echo Yii::app()->createUrl('user/myaccount') ?>"><img src="<?php echo Yii::app()->user->getAvaLink() ?>" /></a>
        <a class="visualButton" id="optionAccount"></a>
    </div>
<?php endif ?>
