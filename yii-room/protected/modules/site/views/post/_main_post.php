<div class="stdForm">
    <div class="beauty"></div>
    <?php echo $form->errorSummary($model); ?>
    <div class="row-fluid">
        <?php echo $form->textFieldRow(
                $model,
                'name',
                array(
                    'class'=>'span11',
                    'placeholder'=>'+Thông tin cơ bản về doanh nghiệp',
                    'labelOptions'=>array('label'=>false),
                    'prepend' => '<i class="icon-sic-rename"></i>'
            )); 
        ?>
    </div>
    <div class="row-fluid">
    	<?php echo $form->textArea(
            	$model,'description',
            	array(
                    'class' => 'span12', 
                    'rows' => 4,
                    'placeholder'=>'Giới thiệu về bản thân/ doanh nghiệp')); 
        ?>
	</div>
</div>