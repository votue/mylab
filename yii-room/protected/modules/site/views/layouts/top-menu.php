<?php
$active= array(
	'apiroom'=>false,
	'bootstraproom'=>false,
	'includeroom'=>false,
	'modelroom'=>false,
	'pluginroom'=>false,
	'userroom'=>false,
	'widgetroom'=>false,
	'pureroom'=>false,
);
$controller = Yii::app()->controller->getId();
$active[$controller] = true;

	$this->widget(
		'bootstrap.widgets.TbNavbar',
		array(
			'brand' => 'Room',
			'type'=>'inverse',
			'fixed' => true,
			'items' => array(
				array(
					'class' => 'bootstrap.widgets.TbMenu',
					'items' => array(
						array('label' => 'Api', 'url' => $this->createUrl('apiroom/index'),'active'=>$active['apiroom']),
						array('label' => 'Bootstrap', 'url' => $this->createUrl('bootstraproom/index'),'active'=>$active['bootstraproom']),
						array('label' => 'Include', 'url' => $this->createUrl('includeroom/index'),'active'=>$active['includeroom']),
						array('label' => 'Model', 'url' => $this->createUrl('modelroom/index'),'active'=>$active['modelroom']),
						array('label' => 'Plugin', 'url' => $this->createUrl('pluginroom/index'),'active'=>$active['pluginroom']),
						array('label' => 'User', 'url' => $this->createUrl('userroom/index'),'active'=>$active['userroom']),
						array('label' => 'Widget', 'url' => $this->createUrl('widgetroom/index'),'active'=>$active['widgetroom']),
						array('label' => 'Widget', 'url' => $this->createUrl('pureroom/index'),'active'=>$active['pureroom']),
					)
				)
			),
			'htmlOptions'=>array('id'=>'myTopMenu')
		)
	);
?>