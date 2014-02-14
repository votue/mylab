<div class="defLinksInfo">
    <h2>Email:</h2>
        <?php if(empty($user->email)): ?>
            <span class="defTextGray">ví dụ: example@gmail.com</span>
        <?php else: ?>
            <span><?php echo $user->email ?></span>
        <?php endif; ?>
    <h2>Số điện thoại:</h2>
        <?php if(empty($user->phone)): ?>
            <span class="defTextGray">(+84)xxxxxxxxx</span>
        <?php else: ?>
            <span><?php echo $user->phone ?></span>
        <?php endif; ?>
        
    <h2>Liên kết</h2>
        <?php if(empty($user->my_links)): ?>
            <ul>
                <li class="defTextGray">ví dụ: www.mysite.com</li>
            </ul>
        <?php else: ?>
            <ul>
                <?php foreach($user->getMyLinks() as $item): ?>
                    <li><?php echo CHtml::link($item,Yii::app()->utils->getCurrentLink($item)) ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif; ?>
    <h2>Liên kết</h2>
        <?php if(empty($user->interested_links)): ?>
            <ul>
                <li class="defTextGray">ví dụ: www.vnexpress.vn</li>
            </ul>
        <?php else: ?>
            <ul>
                <?php foreach($user->getInterestedLinks() as $item): ?>
                    <li><?php echo CHtml::link($item,Yii::app()->utils->getCurrentLink($item)) ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif; ?>
</div>

<!-- UPDATE FORM -->
<?php
    $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'modifyLinksForm',
            'htmlOptions' => array('style'=>'display:none','onsubmit'=>'return usrSubmitLinks(this);'),
        )
    );
    
    echo '<h2>Email:</h2>';
    echo $form->textField($user,'email',array('placeholder'=>'example@gmail.com'));

    echo '<h2>Số điện thoại:</h2>';
    echo $form->textField($user,'phone',array('placeholder'=>'+(84)xxxxxxxxx'));

    echo '<h2>Liên kết của bạn <span>(www.example.com)</span></h2>';
    echo $form->textField($user,'my_links',array('placeholder'=>'Link của bạn','data-role'=>'tagsinput','id'=>'myLinksUser'));
    
    echo '<h2>Liên kết bạn thích <span>(www.example.com)</span></h2>';
    echo $form->textField($user,'interested_links',array('placeholder'=>'Link bạn thích','data-role'=>'tagsinput','id'=>'myInterestedUser'));

    $this->widget(
        'bootstrap.widgets.TbButton',
        array('buttonType' => 'submit', 'label' => 'Save','htmlOptions'=>array('class'=>'pull-right btn-info'))
    );

    $this->endWidget();
    unset($form);
?>