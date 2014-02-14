<?php include 'header.php'; ?>
<style type="text/css">
    body{
        background-color: #DCE3E7 !important; 
    }
</style>
<body>
    <header id="top-menu" class="miniBann">
        <div class="container">
            <div id="logo" class="center">
                <a href="<?php echo Yii::app()->getHomeUrl() ?>"><img width="123" src="<?php echo $this->baseUrl.'/images/logo.png' ?>" /></a>
            </div>
        </div>
    </header>
    <div id="navAccount">
        <div class="container">
            <div class="pull-left" id="accArea">
                <img src="<?php echo Yii::app()->user->getAvaLink() ?>" width="50" />
                <h3><a href="#"><?php echo Yii::app()->user->getName() ?></a></h3>
                <!-- <span>|</span> -->
                <a class="imgIcon" href="#"></a>
                <h3><a href="#">Gửi email</a></h3>
                <a class="comtIcon" href="#"></a>
                <h3><a href="#">Trò chuyện</a></h3>
                <!-- <span>|</span> -->
            </div>
            <div class="pull-right" style="width:20%">
                <button class="sicBtt blueBtn rightBtn" style="margin-top:9px">Thêm vào</button>
            </div>
        </div>
    </div>
    <div class="container">
        <?php echo $content ?>
    </div>
</div>
