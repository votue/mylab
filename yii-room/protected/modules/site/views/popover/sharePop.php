<div>
	<?php $cat = Category::model()->findAll() ?>
	<ul class="options">
		<?php foreach($cat as $item): ?>
			<li class="shareTo(<?php $model->id ?>,<?php $item->id ?>)?>"><?php echo $item->name ?></li>	
		<?php endforeach ?>
	</ul>
</div>