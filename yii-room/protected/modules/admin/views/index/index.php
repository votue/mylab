
    <div class="row-fluid">
        <div class="span6">
            <div class="head clearfix">
                <div class="isw-calendar"></div>
                <h1>Latest board</h1>                  
            </div>
            <div class="block news scrollBox" style="padding:0px">
                <div>
                    <!-- loop here -->
                    <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                            <thead>
                                <tr>
                                    <th width="60">Date</th>
                                    <th>Board Name</th>
                                    <th>Buzzers</th>
                                    <th width="160">User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($lastBoard as $row):?>
                                    <tr>
                                        <?php //get time 
                                            
                                            if(!empty($row->created)){
                                                $time = date("g:i", strtotime($row->created));
                                                $day = date("F j", strtotime($row->created)); ?>
                                            <td>
                                                <span class="date"><?php echo Chtml::encode($day) ?></span>
                                                <span class="time"> <?php echo Chtml::encode($time) ?></span>
                                            </td>
                                        
                                        <?php }else { ?>
                                            
                                            <td></td>
                                        
                                        <?php } ?>
                                        <td>
                                            <a href="<?php echo $this->createUrl('/admin/board/editpage', array('id' => $row->id)); ?>">
                                                <?php echo Chtml::encode($row->name) ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php $count = count(Buzzer::model()->findAllByAttributes(array('board_id'=>$row->id))); ?>
                                            <?php echo Chtml::encode($count) ?> Buzzers
                                        </td>
                                        <td>
                                            <a href="<?php echo $this->createUrl('/admin/members/edituser', array('id' => $row->member_id)); ?>">
                                                <?php $email = isset($row->member->email)?Chtml::encode($row->member->email):''; ?>
                                                <?php echo $email ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>                                   
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" align="right"><button class="btn btn-small" onclick="location.href='<?php echo $this->createUrl('/admin/board'); ?>'">More...</button></td>
                                </tr>
                            </tfoot>
                    </table>
                    <!-- endloop -->
                </div>

            </div>
        </div> 
             
        <div class="span6">
            <div class="head clearfix">
                <div class="isw-users"></div>
                <h1>Last User</h1>
                <!--<ul class="buttons">        
                    <li>
                        <a href="#" class="isw-users"></a>
                    </li>
                    <li>
                        <a href="#" class="isw-settings"></a>
                        <ul class="dd-list">
                            <li><a href="#"><span class="isw-list"></span> Show all</a></li>
                            <li><a href="#"><span class="isw-mail"></span> Send mail</a></li>
                            <li><a href="#"><span class="isw-refresh"></span> Refresh</a></li>
                        </ul>
                    </li>
                    <li class="toggle"><a href="#"></a></li>
                </ul> -->
            </div>
            <div class="block users scrollBox" style="padding:0px">
                <!-- loop here -->
                <div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                            <thead>
                                <tr>
                                    <th width="60">Username</th>
                                    <th>Email</th>
                                    <th>Boards</th>
                                    <th>Package</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($lastMember as $row):?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo $this->createUrl('/admin/members/edituser',array('id'=>$row->id)) ?>">
                                                <?php echo CHtml::encode($row->username) ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo $this->createUrl('/admin/members/edituser',array('id'=>$row->id)) ?>" class="name">
                                                <?php echo CHtml::encode($row->email) ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php $count = count(Board::model()->findAllByAttributes(array('member_id'=>$row->id))); ?>
                                            <?php echo Chtml::encode($count) ?> Boards
                                        </td>
                                        <td>
                                            <a href="<?php echo $this->createUrl('/admin/members/edituser',array('id'=>$row->id)) ?>" class="name"><?php echo CHtml::encode($row->package->name) ?></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>                                   
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" align="right"><button class="btn btn-small" onclick="location.href='<?php echo $this->createUrl('/admin/members'); ?>'">More...</button></td>
                                </tr>
                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">    
        <div class="span6">
            <div class="head clearfix">
                <div class="isw-users"></div>
                <h1>Page Views : </h1>
                <div>  
                    <img src="http://hitwebcounter.com/counter/counter.php?page=5026543&style=0025&nbdigits=5&type=page&initCount=0" title="Every Type Of Page Total" Alt="Every Type Of Page Total"   border="0" style="margin: 5px 0px 0px 20px;" >
                </div>
            </div>     
        </div>
        
        <div class="span6">
            <div class="head clearfix">
                <div class="isw-users"></div>
                <h1>Total Registered Users : </h1>
               
                <h1>
                    <a href="<?php echo $this->createUrl('/admin/members') ?>" style="color: white;" >
                        <?php 
                            $results = Members::model()->findAll();
                            $count = count ( $results ); 
                            echo $count;
                        ?>
                        user(s)
                    </a>
                </h1>
            </div>     
        </div>
    </div>
    
    <div class="row-fluid">
        <div class="span6">
            <div class="head clearfix">
                <div class="isw-users"></div>
                <h1>Share Count Buzzer : </h1>
            </div>
            <div>   
               <div class="block users scrollBox" style="padding:0px">
                <!-- loop here -->
                    <div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                        <th>Buzzer Name</th>
                                        <th>Facebook Share Count</th> 
                                        <th>Email Share Count</th> 
                                        <th>Total Share Count</th>
                                        <th>Block/Options</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $limit = count($adminpopulars) - 1; ?>
                                    <?php foreach ($adminpopulars as $i=>$buzzer): ?>
                                        <tr>
                                            <th>
                                                <?php echo $buzzer->name; ?>   
                                            </th>
                                            
                                            <th>
                                                <?php echo $buzzer->facebook_share; ?>
                                                <a href="<?php echo $this->createUrl('buzzer/changefacebooksharing', array( 'id' => $buzzer->id )); ?>" class="tipb icon-edit" style="float: right;"></a>
                                            </th>
                                            
                                            <th>
                                                <?php echo $buzzer->mail_share; ?>
                                                <a href="<?php echo $this->createUrl('buzzer/changemailsharing', array( 'id' => $buzzer->id )); ?>" class="tipb icon-edit" style="float: right;"></a>
                                            </th>
                                            
                                            <th>
                                                <?php echo ($buzzer->facebook_share + $buzzer->mail_share); ?>
                                                
                                            </th>
                                         
                                            <th>
                                                <a href="#myVideo" role="button" class="icon-eye-open youtube" dataId="<?php echo CHtml::encode($buzzer->id) ?>"></a>
                                                <a href="<?php echo $this->createUrl('buzzer/deletepage', array( 'id' => $buzzer->id)); ?>"   class="tipb icon-remove-circle removeTooltip"  data-original-title="<?php echo Yii::t('global', 'Delete this buzzer.'); ?>"></a>
                                                <?php if(intval($buzzer->public) == 1):?>
                                                    <a href="<?php echo $this->createUrl('buzzer/block', array( 'id' => $buzzer->id )); ?>"><div class="public" style="float: left; margin: 5px 3px 0px 0px;"></div></a>
                                                <?php else: ?>
                                                    <a href="<?php echo $this->createUrl('buzzer/block', array( 'id' => $buzzer->id )); ?>"><div class="nonePublic" style="float: left; margin: 5px 3px 0px 0px;"></div></a>
                                                <?php endif ?>
                                            </th>
                                           
                                        </tr>
                                    <?php endforeach ?>                                   
                                </tbody>
                                
                        </table>
                    </div>     
                </div>
            </div>
        </div>
    </div>
    
    
<div id="myVideo" class="modal hide fade">
    <div class="modal-body">   
        <div class="videoYoutube" style="height:300px">
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        $('.youtube').click(function(){
            var essay_id = $(this).attr('dataId');
            
            $.ajax({
                type : 'get',
                url : '/buzzer/load?id='+ essay_id,
                                                     
                success : function(data)
                {
                    $('#myVideo').modal();
                    $('.videoYoutube').show().html(data);
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $(.removeTooltip).tooltip();
    });
</script>
                