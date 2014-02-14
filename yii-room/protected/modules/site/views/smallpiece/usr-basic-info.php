<div class="defBasicInfo">
    <h2>Giới tính</h2>
    <?php if(!empty($user->gene)): ?>
        <span><?php echo $user->geneName ?></span>
    <?php else: ?>
        <span class="defTextGray">chưa xác định</span>
    <?php endif ?>
    
    <h2>Sinh nhật</h2>
    <?php if(!empty($user->birthday)): ?>
    
        <span><?php echo date("d-m-Y", strtotime($user->birthday)); ?></span>
    <?php else: ?>
        <span class="defTextGray">Chưa xác định</span>
    <?php endif ?>

    <h2>Mối quan hệ</h2>
    <?php if(!empty($user->relation)): ?>
        <span><?php echo $user->relName ?></span>
    <?php else: ?>
        <span class="defTextGray">Chưa xác định</span>
    <?php endif ?>
</div>

<!-- UPDATE FORM -->
<?php
    $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'modifyBasicForm',
            'htmlOptions' => array('style'=>'display:none','onsubmit'=>'return usrSubmitBasic(this);'),
        )
    );
    echo '<h2>Giới tính</h2>';
    echo $form->dropDownList($user,'gene',User::arrayGene());
    
    echo '<h2>Sinh nhật</h2>';
    echo $form->datepickerRow($user,'birthday',
        array(
            'options'=>array('format'=>'dd/mm/yyyy'),
            'prepend' => '<i class="icon-calendar"></i>',
            'labelOptions' => array('label' => ''))
    );

    echo '<h2>Mối quan hệ</h2>';
    echo $form->dropDownList($user,'relation',User::arrayRelation());

    $this->widget(
        'bootstrap.widgets.TbButton',
        array('buttonType' => 'submit', 'label' => 'Save','htmlOptions'=>array('class'=>'pull-right btn-info'))
    );

    $this->endWidget();
    unset($form);
?> 