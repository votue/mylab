<div class="defJobInfo">
    <h2>Nghề nghiệp</h2>
    <?php if(empty($user->job)): ?>
        <ul>
            <li class="defTextGray">ví dụ: Kiến trúc sư</li>
        </ul>
    <?php else: ?>
        <ul>
            <?php foreach($user->myJobs as $item): ?>
                <li><?php echo $item ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>

    <h2>Nơi làm việc</h2>
    <?php if(empty($user->work_at)): ?>
        <span class="defTextGray">ví dụ: Your Company</span>
    <?php else: ?>
        <span><?php echo $user->work_at ?></span>
    <?php endif ?>
</div>

<!-- UPDATE FORM -->
<?php
    $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'modifyJobsForm',
            'htmlOptions' => array('style'=>'display:none','onsubmit'=>'return usrSubmitJob(this);'),
        )
    );
    echo '<h2>Nghề nghiệp</h2>';
    echo $form->textField($user,'job',array('placeholder'=>'công việc','data-role'=>'tagsinput','id'=>'myJobUser'));
    
    echo '<h2>Nơi làm việc</h2>';
    echo $form->textField($user,'work_at',array('placeholder'=>'nơi làm việc','id'=>'myWorkAtUser'));

    $this->widget(
        'bootstrap.widgets.TbButton',
        array('buttonType' => 'submit', 'label' => 'Save','htmlOptions'=>array('class'=>'pull-right btn-info'))
    );

    $this->endWidget();
    unset($form);
?>