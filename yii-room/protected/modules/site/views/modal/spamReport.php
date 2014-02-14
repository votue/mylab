<?php
    $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'spamReportForm',
            'htmlOptions' => array(
                'onsubmit'=>'return reportSpam(this)',
                'dataUrl'=>$this->createUrl('index/spamReport',array('id'=>$id,'type'=>$type))
            ),
        )
    );
?>
    <div class="row-fluid">
        <?php echo $form->textFieldRow(
                $model,
                'email',
                array(
                    'class'=>'span12',
                    'placeholder'=>'Email',
                    'labelOptions'=>array('label'=>false)
            ))  ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->textAreaRow(
                $model,
                'content',
                array(
                    'class' => 'span12',
                    'placeholder'=>'Nội Dung',
                    'labelOptions'=>array('label'=>false)
            ))  ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->hiddenField(
                $model,
                'type',
                array('value'=>$type))  ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->hiddenField(
                $model,
                'foreign_key',
                array('value'=>$id))  ?>
    </div>
    <div class="row-fluid btnPanel" style="text-align:right;margin:20px 0px">
        <button class="sicBtt blueBtn rightBtn">Gởi</button>
        <button class="sicBtt rightBtn" onclick="$('#myModal .close').click()">Hủy</button>
    </div>
<?php $this->endWidget(); ?>