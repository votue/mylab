<!-- Modal -->
<div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel"><i class="fa fa-user"></i> Đăng Nhập</h4>
    </div>
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
    array(
        'id' => 'registerForm',
        'htmlOptions' => array(),
        'action'=>$this->createUrl('user/login')
    )); ?>
        <?php $model = new LoginForm ?>
        <div class="modal-body">     
            <div class="content">
                <fieldset>
                    <div class="row-fluid">
                        <?php echo $form->textFieldRow($model, 'username', array('labelOptions'=>array('class'=>'span5'),'class' => 'span5')); ?>
                    </div>
                    <div class="row-fluid">
                        <?php echo $form->passwordFieldRow($model, 'password', array('labelOptions'=>array('class'=>'span5'),'class' => 'span5')); ?>
                    </div>
                    <div class="row-fluid">
                        <div class="span5">
                            <?php echo $form->checkbox($model, 'rememberMe',array('style'=>'margin-left:215px')); ?>
                        </div>
                        <div class="span5">
                            <?php echo $form->label($model, 'rememberMe',array('style'=>'text-align:left;margin:2px 0px 0px 5px;color:#777;font-size:11px;')); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span5 offset5">
                            <a href="javascript:void(0)" onclick="showSignup()"><i class="fa fa-key" style="margin:0px 5px 0px -11px"></i>Tạo một tài khoản</a>
                        </div>
                    </div>
                </fieldset>
            </div>             
        </div>
        <div class="modal-footer">
            <?php $this->widget('bootstrap.widgets.TbButton',
                    array('buttonType' => 'submit', 'label' => 'Đăng nhập','htmlOptions' => array('class'=>'btn-primary'))); ?>
            <?php $this->widget('bootstrap.widgets.TbButton',
                    array('buttonType' => 'button', 'label' => 'Đóng','htmlOptions' => array('class'=>'btn','data-dismiss'=>'modal','aria-hidden'=>'true'))); ?>
        </div>
    <?php $this->endWidget(); ?> 
</div>