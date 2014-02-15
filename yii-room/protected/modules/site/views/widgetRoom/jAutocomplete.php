<?php
	$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
		'name'=>'school',
		'sourceUrl'=>Yii::app()->createUrl('widgetroom/getStaticData'),
		'options'=>array(
			'showAnim'=>'fold',
			'minLength'=>'2',
			'type'=>'get',
			'select'=>'js:function(event, ui) {
				console.log(ui);
				//How do i store this below in Yii into PHP (so I can insert into DB)??
				$("#selectedSchool").text(ui.item.value);
			}'
		),
		'htmlOptions'=>array(
			'style'=>'width: 500px;',
			'placeholder' => 'Type your School'
			),
		)
	);
?>
<span id="selectedSchool"></span>