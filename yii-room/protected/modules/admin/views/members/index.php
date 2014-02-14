<div class="page-header">
	<h1>Manage <small>Members</small></h1>
</div>

<!-- Start .notifications -->
<?php $this->widget('widgets.admin.notifications'); ?>
<!-- End .notifications -->

<div class="row-fluid">
	<div class="span12">                    
		<div class="head clearfix">
			<div class="isw-users"></div>
			<h1><?php echo Yii::t('adminmembers', 'Members'); ?> (<?php echo Yii::app()->format->number($count); ?>)</h1>                     
		</div>
		<div class="block-fluid">
			<?php echo CHtml::form(); ?>
			<table cellpadding="0" cellspacing="0" width="100%" class="table">
				<thead>
					<tr>
					    <th style='width: 2%;'><input name="checkall" type="checkbox" /></th>			
					    <th style='width: 10%;'><?php echo $sort->link('username', Yii::t('adminmembers', 'Username'), array( 'class' => 'tipb', 'title' => Yii::t('adminmembers', 'Sort user list by username') ) ); ?></th>
					    <th style='width: 25%;'><?php echo $sort->link('email', Yii::t('adminmembers', 'Email'), array( 'class' => 'tipb', 'title' => Yii::t('adminmembers', 'Sort user list by email') ) ); ?></th>
					    <th style='width: 10%;'>Boards</th>
					    <th style='width: 10%;'><?php echo $sort->link('package', Yii::t('adminmembers', 'Package'), array( 'class' => 'tipb', 'title' => Yii::t('adminmembers', 'Sort user list by backage') ) ); ?></th>
					    <th style='width: 15%;'><?php echo $sort->link('joined', Yii::t('adminmembers', 'Joined'), array( 'class' => 'tipb', 'title' => Yii::t('adminmembers', 'Sort user list by joined date') ) ); ?></th>
					    <th style='width: 10%;'><?php echo Yii::t('adminmembers', 'Options'); ?></th>						
					</tr>
				</thead>
				<tbody>
					<?php if ( count($members) ): ?>
						<?php foreach ($members as $row): ?>
							<tr>
								<td><?php echo CHtml::checkbox( 'user[' . $row->id.']' ); ?></td>
								<td><a target="_blank" href="<?php echo $this->createUrl('members/edituser', array( 'id' => $row->id )); ?>" class="tipb" data-original-title="<?php echo Yii::t('adminmembers', 'View User'); ?>"><?php echo CHtml::encode($row->username); ?></a></td>
								<td><?php echo CHtml::encode($row->email); ?></td>
								<td>
									<?php $boards = Board::model()->findAllByAttributes(array('member_id'=>$row->id)) ?>
									<?php echo isset($boards)?count($boards):'0' ?> Boards
								</td>
								<td><?php echo CHtml::encode($row->package->name); ?></td>
								<td class="tipb"><span><?php echo Yii::app()->dateFormatter->formatDateTime($row->joined, 'short', 'short'); ?></span></td>
								<td>
									<?php echo CHtml::link('',$this->createUrl('members/edituser', array( 'id' => $row->id )), array('class'=>'tipb icon-edit')); ?>
									<?php echo CHtml::link('',$this->createUrl('members/deleteuser', array( 'id' => $row->id )), array('class'=>'tipb icon-remove-circle', 'confirm' => 'Are you sure?')); ?>
								</td>
							</tr>
						<?php endforeach ?>
					<?php else: ?>	
						<tr>
							<td colspan='5' style='text-align:center;'><?php echo Yii::t('adminmembers', 'No members found.'); ?></td>
						</tr>
					<?php endif; ?>                               
				</tbody>
			</table>
			<div class="footer tar">
				<select name="bulkoperations">
					<option value=""><?php echo Yii::t('global', '-- Choose Action --'); ?></option>
					<option value="bulkdelete"><?php echo Yii::t('global', 'Delete Selected'); ?></option>
				</select>
				<?php echo CHtml::submitButton( Yii::t('global', 'Apply'), array( 'confirm' => Yii::t('adminmembers', 'Are you sure you would like to perform a bulk operation?'), 'class'=>'btn')); ?>
            </div>
			<?php echo CHtml::endForm(); ?>
		</div>
	</div>                                
</div>

<?php $this->widget('widgets.MyADPager', array('pages'=>$pages, 'htmlOptions'=>array('class'=>'paging') )); ?>
