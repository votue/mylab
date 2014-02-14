<div class="stdForm">
    <div class="beauty"></div>
    <?php $disName = empty($model->disRel->fullname)?'':$model->disRel->fullname ?>
    <div class="row-fluid">
        <div class="input-prepend">
            <span class="add-on"><i class="icon-sic-location"></i></span>
            <div class="span11" style="margin-left:0px">
                <?php
                    $this->widget('bootstrap.widgets.TbTypeahead', array(
                        'name'=>'Post[district_name]',
                        'value'=>$disName,
                        'options'=>array(
                            'source'=>array_values(CHtml::listData(District::model()->findAll(),'id','fullname')),
                            'items'=>6,
                            'matcher'=>"js:function(item) {
                                return ~item.toLowerCase().indexOf(this.query.toLowerCase());
                            }",
                        ),
                        'htmlOptions'=>array("class"=>"span6","placeholder"=>'+Quận/Huyện Tỉnh/Thành Phố')
                    ));
                ?>
                <?php echo $form->textFieldRow(
		                $model,
		                'street',
		                array(
		                    'class'=>'span6',
		                    'placeholder'=>'+Địa chỉ',
		                    'labelOptions'=>array('label'=>false),
		            )); 
		        ?>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        
    </div>

    <div class="row-fluid">
        <?php echo $form->TextFieldRow(
                $model,
                'website',
                array(
                    'class'=>'span11',
                    'labelOptions'=> array('label'=>false),
                    'placeholder'=>'+ Nhập hoặc dán liên kết đến trang của bạn',
                    'prepend' => '<i class="icon-sic-link"></i>'));
        ?>
    </div>

    <?php 
        $user = User::model()->findByPk(Yii::app()->user->id);
        $group = new Group;

    ?>
    <div class="row-fluid">
        <div class="input-prepend">
            <span class="add-on"><i class="icon-sic-group"></i></span>
            <?php 
            echo $form->dropDownListRow(
                $group,
                'id',
                CHtml::listData(Group::model()->findAll(array("condition"=>"status = ".Group::STT_PUBLISH)),'id', 'name'),
                array(
                    'labelOptions'=>array('label'=>false),
                    'prompt'=>'+ Nhóm của bạn',
                    'class'=>'span11',
                )
            ); ?>
        </div>
    </div>

    <div class="row-fluid">
        <?php echo $form->textFieldRow(
                $model,
                'taglist',
                array(
                    'placeholder'=>'+Thêm tag',
                    'class'=>'span11',
                    'id'=>'postTags',
                    'value'=>$model->Taglist,
                    'labelOptions'=>array('label'=>false),
                    'prepend' => '<i class="icon-sic-tag"></i>'
            )); 
        ?>
    </div>
    
    <div class="row-fluid">
        <div class="input-prepend">
            <span class="add-on"><i class="icon-sic-tag"></i></span>
            <?php 
            echo $form->dropDownListRow(
                $model,
                'cat_id',
                CHtml::listData(Category::model()->findAll(array("condition"=>"status = ".Category::STT_PUBLISH)),'id', 'name'),
                array(
                    'labelOptions'=>array('label'=>false),
                    'prompt'=>'chọn một loại',
                    'class'=>'span11',
                )
            ); ?>
        </div>
    </div>
</div>