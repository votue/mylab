<div  class="defLocalInfo">
    <h2>Hiện tại:</h2>
    <?php if(isset($user->LocRel)): ?>
        <span> <?php echo $user->LocRel->fullname ?></span>
    <?php else: ?>
        <span class="defTextGray">Chưa xác định</span>
    <?php endif?>

    
    <h2>Nơi từng sống:</h2>
    <?php if(isset($user->PasLocRel)): ?>
        <span> <?php echo $user->PasLocRel->fullname ?></span>
    <?php else: ?>
        <span class="defTextGray">Chưa xác định</span>
    <?php endif ?>
    
</div>
<!-- UPDATE FORM -->
<?php
    $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'modifyLocalForm',
            'htmlOptions' => array('style'=>'display:none','onsubmit'=>'return usrSubmitLocal(this);'),
        )
    );

    echo '<h2>Hiện tại:</h2>';

    if(!empty($user->LocRel)){
        $add1 = $user->LocRel->fullname;
    }else{
        $add1 = 'chọn một địa chỉ';
    }
    $this->widget('bootstrap.widgets.TbTypeahead', array(
        'name'=>'User[district_name]',
        'options'=>array(
            'source'=>array_values(CHtml::listData(District::model()->findAll(),'id','fullname')),
            'items'=>6,
            'matcher'=>"js:function(item) {
                return ~item.toLowerCase().indexOf(this.query.toLowerCase());
            }",
        ),
        'htmlOptions'=>array("class"=>"span6","placeholder"=>$add1)
    ));

    echo '<h2>Nơi từng sống:</h2>';
    if(!empty($user->PasLocRel)){
        $add1 = $user->PasLocRel->fullname;
    }else{
        $add1 = 'chọn một địa chỉ';
    }
    $this->widget('bootstrap.widgets.TbTypeahead', array(
        'name'=>'User[past_district_name]',
        'options'=>array(
            'source'=>array_values(CHtml::listData(District::model()->findAll(),'id','fullname')),
            'items'=>6,
            'matcher'=>"js:function(item) {
                return ~item.toLowerCase().indexOf(this.query.toLowerCase());
            }",
        ),
        'htmlOptions'=>array("class"=>"span6","placeholder"=>$add1)
    ));

    $this->widget(
        'bootstrap.widgets.TbButton',
        array('buttonType' => 'submit', 'label' => 'Save','htmlOptions'=>array('class'=>'pull-right btn-info'))
    );

    $this->endWidget();
    unset($form);
?> 
