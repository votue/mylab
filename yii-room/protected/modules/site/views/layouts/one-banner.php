<?php include 'header.php'; ?>
<body>
    <header id="top-menu" class="miniBann">
        <div class="container">
            <div id="logo" class="center">
                <a href="<?php echo Yii::app()->getHomeUrl() ?>"><img width="123" src="<?php echo $this->baseUrl.'/images/logo.png' ?>" /></a>
            </div>
        </div>
    </header>
    <div class="container">
        <?php echo $content ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('body').css({'background':'#211E1F','overflow':'hidden'});
        $('.container').css({'width':'100%'});
        $('#top-menu').css({'border-bottom':'1px solid #0D2834'});
        /*$('#myCarousel').carousel({interval: false});*/
        $('.bxslider').bxSlider({
            pagerCustom: '.bx-pager',
            nextText: '<i style="font-size:100px" class="fa fa-angle-right"></i>',
            prevText: '<i style="font-size:100px" class="fa fa-angle-left"></i>',
        });
        var heightItem = $('#psSlide #myCarousel').height();
        $('#myCarousel .item .figure img').each(function(){
            $(this).css({'max-height':heightItem });
        })      
    })
</script>