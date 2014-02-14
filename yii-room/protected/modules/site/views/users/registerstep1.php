<section>
    <div id="wrapContent" class="">  
        <div id="mainContent" >
            <div class="buzzBox row-fluid">
                <div id="buzzDivheard"class="center clearfix">
                    <small id="buzzheard">Registration</small>
                    <div class="right">
                        
                    </div>
                </div>
                <div class="span9 offset1 center" style="margin-top:50px">
                    <?php echo CHtml::form($this->createUrl('register/index', array('lang'=>Yii::app()->language)), 'post', array('class'=>'frmcontact', 'id'=>'validation2', 'enctype'=>'multipart/form-data')); ?>
                       
                        <fieldset>
                        	<h3 class="span3 textright">E-Mail:</h3>
                            <?php echo CHtml::TextField('email', array( 'class' => 'span4 validate[required,custom[email]]','placeholder'=>'Max.Mustermann@gmail.com', 'size'=>50, 'title' => Yii::t('register', 'Enter your desired email address') ),array('style'=>'margin-top:16px')); ?> 
                        </fieldset>
                        <div style="clear: both;"></div>
                        <div class="clearfix listIconSocial span5 offset5" >
                            <ul>
                                <li><a href="#"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/facebook_icon.png" /></a></li>
                                <li><a href="#"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/twitter_icon.png"  /></a></li>
                                <li><a href="#"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/google_icon.png"  /></a></li>
                                <li><a href="#"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/yme_icon.png"  /></a></li>
                                <li><a href="#"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/myspace_icon.png" /></a></li>   
                            </ul>
                        </div>
                        <div style="clear: both;"></div>
                        <div class="clearfix" style="margin-bottom:45px"></div>
                        <div class="divSubmit" style="margin-left:239px">
                            <?php echo CHtml::submitButton(Yii::t('global', 'Send'), array('class'=>'submitButton')); ?>
                            <img class="submitImg" src="<?php echo Yii::app()->themeManager->baseUrl.'/images/checkSmall.png' ?>"/>                      
                        </div>
                    <?php echo CHtml::endForm(); ?>	
                </div>
            </div>
        </div><!-- End mainContent --> 
     </div>
</section>
