<?php
$tabs = array(
	array(
		'label' => 'CJuiAutoComplete',
		'content' => $this->renderPartial('jAutocomplete',true,true),
		'active' => true
	),
	array('label' => 'Profile', 'content' => 'Profile Content'),
	/*array(
		'label' => 'DropDown',
		'items' => array(
			array('label' => 'Item1', 'content' => 'Item1 Content'),
			array('label' => 'Item2', 'content' => 'Item2 Content')
		)
	),*/
) ?>
<div class="row-fluid">
	<?php $this->widget(
	'bootstrap.widgets.TbTabs',
		array(
			'type' => 'tabs',
			'placement' => 'left',
			'tabs' => $tabs
		)
	);?>
</div>

