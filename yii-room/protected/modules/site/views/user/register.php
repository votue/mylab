<div class="stdBox" style="width:620px;margin-left:240px">
    <h1 class="title">Đăng Kí</h1>
    
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
                <?php echo $form->textFieldRow($model, 'first_name', array('labelOptions'=>array('class'=>'span5'),'class' => 'span5')); ?>
            </div>
            <div class="row-fluid">
                <?php echo $form->textFieldRow($model, 'last_name', array('labelOptions'=>array('class'=>'span5'),'class' => 'span5')); ?>
            </div>
            <div class="row-fluid">
                <?php echo $form->passwordFieldRow($model, 'password', array('labelOptions'=>array('class'=>'span5'),'class' => 'span5')); ?>
            </div>
            <div class="row-fluid">
                <?php echo $form->passwordFieldRow($model, 'password2', array('labelOptions'=>array('class'=>'span5'),'class' => 'span5')); ?>
            </div>
            <div class="row-fluid">
                <?php echo $form->textFieldRow($model, 'email', array('labelOptions'=>array('class'=>'span5'),'class' => 'span5')); ?>
            </div>
        </fieldset>
    </div>
    <div class="footer">
        <?php
        $this->widget('bootstrap.widgets.TbButton',
            array('buttonType' => 'submit', 'label' => 'Đăng kí','htmlOptions' => array('class'=>'btn-info','style'=>'margin:0px 0px 55px 416px')));
        ?>     
    </div> 
    <?php $this->endWidget(); ?>  
</div>