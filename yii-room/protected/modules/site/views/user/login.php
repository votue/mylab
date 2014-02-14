<div class="stdBox" style="width:620px;margin-left:240px">
    <h1 class="title">Đăng nhập</h1>
    
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'registerForm',
            'htmlOptions' => array(), // for inset effect
        ));?>
    <div class="content">
        <fieldset>
            <div class="row-fluid">
                <?php echo $form->textFieldRow($model, 'username', array('labelOptions'=>array('class'=>'span5'),'class' => 'span5')); ?>
            </div>
            <div class="row-fluid">
                <?php echo $form->passwordFieldRow($model, 'password', array('labelOptions'=>array('class'=>'span5'),'class' => 'span5')); ?>
            </div>
            <div class="row-fluid">
                <div class="span5">
                    <?php echo $form->checkbox($model, 'rememberMe',array('style'=>'margin-left:215px')); ?>
                </div>
                <div class="span5">
                    <?php echo $form->label($model, 'rememberMe',array('style'=>'text-align:left;margin:0px 0px 0px -12px')); ?>
                </div>
                
            </div>
        </fieldset>
    </div>
    <div class="footer">
        <?php
        $this->widget('bootstrap.widgets.TbButton',
            array('buttonType' => 'submit', 'label' => 'Đăng nhập','htmlOptions' => array('class'=>'btn-info','style'=>'margin:0px 0px 25px 400px')));
        ?>     
    </div> 
    <?php $this->endWidget(); ?>  
</div>