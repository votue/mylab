<div class="cpanel">
    <?php $this->renderPartial('/elements/user_buttons'); ?>
</div><!--end logo -->

<?php $this->widget('widgets.admin.notifications'); ?>

<div id="content"> 
    <div id="setting-buzzer">
        <h1>SETTINGS</h1>
        <div class="head-setting"></div>
        <div class="content-setting">
            <form class="form-horizontal">
              <div class="control-group">
                <label class="control-label" for="inputActive">Active buzzer:</label>
                <label > <?php echo $member->package->buzzers?> Buzzer</label>  
              </div>
              <div class="control-group">
                <label class="control-label" for="">Active BuzzBoards:</label> 
                <label ><?php echo $member->package->boards?> BuzzBoards</label> 
                <button type="button" class="btn btn-upgrade" onclick="location.href='<?php echo $this->createUrl('/users/upgrade')?>'">Upgrade</button>
              </div>
              <div class="control-group">
                <label class="control-label" for="">NEWSLETTER:</label> 
                <div class="controls">
                    <?php Newsletter::model()->checkEmail(Yii::app()->user->email)?$check='checked':$check=''?>
                    <input type="checkbox" id="checkNews" <?php echo $check ?>/>
                </div>
              </div>
              <hr></hr>
            <label class="control-label" for="">Change Password</label>
            <div class="controls">
              <input type="password" maxlength="255" required="required" id="passVal" placeholder=""/>
              <button type="button" class="btn btn-info changePass" style="float:right; margin-right:77px;">Save</button>
            </div>
              
            <hr></hr>
             
            <label class="control-label" for="inputPassword">Delete Account</label>
            <div class="controls">
           
                  <!-- Button to trigger modal -->
            <a href="#myModal" role="button" class="btn btn-del" data-toggle="modal">Delete</a>
             
            <!-- Modal -->
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 150px;">
                <div class="modal-body">
                    <p>Are you sure to delete your account ? All data will be deleted</p>
                </div>
                <div class="modal-footer">
                    <a href="#myModal1" role="button" class="btn btn-del" data-toggle="modal">Yes</a>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
                </div>
            </div>
            
            <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 150px;">
                <div class="modal-body">
                    <p style="margin-left:150px;">YOUR ACCOUNT HAS BEEN DELETED</p>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo CController::createUrl("/users/delete")?>" class="btn btn-del" aria-hidden="true">OK</a>
                    
                </div>
            </div>
            
        </div>
        <div class="footer-setting"></div>
    </div>
</div>


<script>

    $(document).ready(function(){
        $('.changePass').click(function(){
            $('#success').remove();
            var $this = $(this);
            var pass = $('#passVal').val();
            $(this).append('<img style="margin-left:2px" id="loading" src="/themes/default/images/ajax-loader.gif"/>');
            $.ajax({
                type: "POST",//get or post
                data: {
                    password: pass
                },
                url: '<?php echo CController::createUrl("users/ajaxchangepass")?>',
                success: function(data) {
                    $('#loading').remove();
                    $('#passVal').parent().append('<img style="margin:-1px 0px 0px 2px" id="success" src="/themes/default/images/checkSmall.png"/>');
                },
                /*error: function(data) { 
                    $('#loading').remove();
                    $('#success').remove();
                    $('#passVal').parent().append('<img style="margin:-1px 0px 0px 2px" id="success" src="/themes/default/images/error.png"/>');
                    alert('This field is required and Minimum 6 characters allowed');
                }   */    
            });    
        });
        $('#checkNews').click(function(){
            $(this).parent().append('<img style="margin-left:2px" id="loading" src="/themes/default/images/ajax-loader.gif"/>');
            $.ajax({
                type: "POST",//get or post
                url: '<?php echo CController::createUrl("/users/ajaxTogglenews")?>',
                success: function(data) {
                    $('#loading').remove();
                },
                error: function(data) { 
                    $('#loading').remove();
                }       
            });
        })
    })
</script>
