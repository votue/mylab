<div class="defBrieInfo">
    <h2>Giới thiệu</h2>
    <?php if(!empty($user->intro_myself)):  ?>
        <p><?php echo $user->intro_myself ?></p>
    <?php else: ?>
        <p class="defTextGray" data-user-id="<?php echo Yii::app()->user->id ?>">Giới thiệu một chút về bản thân.</p>
    <?php endif ?>
</div>
<?php
    $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'modifyInfoForm',
            'action'=>'fuck',
            'htmlOptions' => array('style'=>'display:none','onsubmit'=>'return usrSubmitInfo(this);'),
        )
    );
    echo '<h2>Giới thiệu</h2>';
    echo $form->textArea(
        $user,
        'intro_myself',
        array('class' => 'span12', 'rows' => 2,'label'=>false)
    );

    $this->widget(
        'bootstrap.widgets.TbButton',
        array('buttonType' => 'submit', 'label' => 'Save','htmlOptions'=>array('class'=>'pull-right btn-info'))
    );

    $this->endWidget();
    unset($form);
?>   