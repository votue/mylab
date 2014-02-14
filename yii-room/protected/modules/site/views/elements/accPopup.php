<div class="accPop options">
	<ul>
		<li><?php echo CHtml::link('chia sẽ',array($this->createUrl('post/share'))); ?></li>
		<li><?php echo CHtml::link('chỉnh sửa',array($this->createUrl('user/myaccount'))); ?></li>
		<li><?php echo CHtml::link('đăng xuất',array($this->createUrl('user/logout'))); ?></li>
	</ul>
</div>