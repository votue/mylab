<div class="cpanel">
    <?php $this->renderPartial('/elements/user_buttons'); ?>
</div><!--end logo -->
<div id="content"> 
    <div id="setting-buzzer">
        <h1>ON TIME FEE UPGRADE - BUY MORE BUZZER</h1> 
        <div class="content-buynow">
            <?php foreach ($packages as $i=>$p):
                $i = $i + 1;
            ?>
            <div class="span2 col<?php echo $i?>" style="text-align:center">
                <img src="<?php echo Yii::app()->themeManager->baseUrl?>/images/package_<?php echo $i?>.png" style="margin-bottom:14px"/>
                <div class="head-pay"></div>
                <div class="content-pay row<?php echo $i?>">
                    <?php if($i!=1):?>
                        <?php if($i==4):?>
                            <div class="info-buy">You can save <strong><?php echo $p->boards?></strong> 
                                                                <br/>
                                                                <strong>Buzzboard<?php echo $p->boards>1?'s':''?></strong><br />(<?php echo $p->buzzers ?> Buzzers) with a one-time fee 
                            <br />
                            <br />
                            <strong>Special Offer - Limited</strong></div>
                        <?php else:?>
                            <div class="info-buy">You can save <strong><?php echo $p->boards?></strong>
                                                                 <br/>
                                                                 <strong>Buzzboard<?php echo $p->boards>1?'s':''?></strong> <br />(<?php echo $p->buzzers ?> Buzzers) with a one-time fee</div><br />
                        <?php endif?>
                    <?php else:?>
                        <div class="info-buy">You can save <?php echo $p->buzzers ?> Buzzers for free<br /></div>
                    <?php endif?>
                    <div class="enter-buy"><input class="buy-buzzer" type="text" value="<?php echo $p->price?>&euro;" readonly="readonly" /></div>
                    <?php if($i!=1):?>
                        <?php if ($p->price > $member->package->price): ?>
                            <?php echo CHtml::form($this->createUrl('paypal/buy'), 'post',array('id'=>'idForm_'.$p->id)); ?>
                                <input type="hidden" name="id" value="<?php echo $p->id?>" readonly="readonly" />
                                <input type="hidden" name="price" value="<?php echo $p->price?>"/>
                                <button class="buy-payl" type="button" value="confirmTab_<?=$p->id?>" onclick="showTabs(this.value)" ></button>                            
                            <?php echo CHtml::endForm(); ?>
                        <?php endif;?>
                    <?php endif ?>
                </div>
                <div class="footer-pay"></div>
            </div>
            <div id="confirmTab_<?=$p->id?>" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:200px;">			    
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <p>If you press accept, you agree to our </p>
                    <span><input type="checkbox" class="checknotice"/></span><a href="/terms-and-conditions" style="color: black;"> TERMS & CONDITIONS</a>
                    
                    <div class="line"></div>  
                        <button id="submitLogin" class="buttonLogin blue pull-left" type="button" value="idForm_<?=$p->id?>"  onclick="myFunction(this.value)">ACCEPT</button> 
                        <!--<input type="button" id="submitLogin" value="OK" onclick="myFunction()" class="buttonLogin blue pull-left"/> -->
                </div>
            </div>  
            
            <?php endforeach;?>

            <div class="clearfix"></div>
        </div>
    </div>
</div><!--end content -->
<div class="clearfix"></div> 
