<div class="topWall <?php echo !empty($class)?$class:'' ?>">
    <img src="<?php echo $this->baseUrl.'/images/pencil.png' ?>" width="16" height="16" /><span>Tôi Muốn?</span>
    <textarea class="requestWall" placeholder="What do you want from me..?"></textarea>
    <select class="simpleStyle localWall" style="width:100%">
        <option>Đà Nẵng</option>
        <option>Hà Nội</option>
        <option>Sài Gòn</option>
    <select>
    <a class="visualButton" data-id-select="selectSearch" style="margin: 2px 0px 0px -33px;" onclick="visualButton(this)" href="javascript:void(0)"></a> 
</div>
<div class="oldContWall">
    <?php for($i=0;$i<3;$i++): ?>
        <?php $this->renderPartial('/elements/cmtbox') ?>
    <?php endfor ?>
</div>