<div class="stdForm">
    <div class="beauty"></div>
    <?php echo $form->errorSummary($extend); ?>
    <div class="row-fluid">
        <div class="input-prepend">
            <span class="add-on"><i class="icon-sic-star"></i></span>
            <div class="span9" style="padding-top:8px;margin-bottom:15px">
                <?php     
                    $this->widget('CStarRating',array(
                          'model'=>$extend,
                          'attribute'=>'star',
                          'minRating'=>1,
                          'maxRating'=>5,
                          'starCount'=>5,
                          'readOnly'=>false,
                    ));
                ?>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <?php 
            echo $form->textFieldRow(
                $extend,
                'price',
                array(
                    'class'=>'span11',
                    'labelOptions'=>array('label'=>false),
                    'placeholder'=>'+Nhập giá',
                    'prepend' => '<i class="icon-sic-sell"></i>')
            ); 
        ?>
    </div>
    <div class="row-fluid" style="position:relative">
        <div class="pull-right" style="position:absolute;right:0px">
            <?php 
                echo $form->datepickerRow(
                    $extend,
                    'end_time',
                    array(
                        'options' => array('language' => 'en'),
                        'labelOptions'=>array('label'=>false),
                        'placeholder'=>'đến ngày',
                        'class'=>'span3 pull-right'
                    )
                ); 
            ?>
            <?php 
                echo $form->datepickerRow(
                    $extend,
                    'begin_time',
                    array(
                        'options' => array('language' => 'en'),
                        'labelOptions'=>array('label'=>false),
                        'placeholder'=>'từ ngày',
                        'class'=>'span3 pull-right'
                    )
                ); 
            ?>
        </div>
        <?php 
            echo $form->textFieldRow(
                $extend,
                'promotion',
                array(
                    'class'=>'span6',
                    'labelOptions'=>array('label'=>false),
                    'placeholder'=>'+Nhập số % cho đợt khuyến mãi',
                    'prepend' => '<i class="icon-sic-sale"></i>')
            ); 
        ?>
        
    </div>
    
</div>