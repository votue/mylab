<!DOCTYPE html>
<!--[if IE 8 ]> <html lang="<?php echo Yii::app()->language; ?>" class="ie8"> <![endif]-->
<!--[if (gt IE 8)]><!--> <html lang="<?php echo Yii::app()->language; ?>"> <!--<![endif]-->
<head>
    <meta charset="<?php echo Yii::app()->charset; ?>">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="shortcut icon" href="<?php echo $this->baseUrl.'/favicon.png'?>" type="image/x-icon" />

    
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    

    <?php 
        //register script and style
        $cs = Yii::app()->getClientScript();
        
        //registry css
        $fileCss = array(
            $this->baseUrl.'/css/bootstrap.min.css',
            $this->baseUrl.'/css/styles.css'
        );
        foreach($fileCss as $file){
            $cs->registerCssFile($file); 
        }

        //registry js
        $fileJs = array(
            $this->baseUrl . '/js/bootstrap.js',
            $this->baseUrl . '/js/script.js',            
        );
        foreach($fileJs as $file){
            $cs->registerScriptFile($file);
        }
    ?>
    <!-- difine global var for js file -->
    <script type="text/javascript">
        var baseUrl = "<?php echo Yii::app()->baseUrl ?>" ;
    </script>
</head>

<body style="background-color:#1D5C7B">
    <header id="top-menu" style="margin-bottom:0px">
        <div class="container">
            <div class="pull-left">
                <div id="logo">
                    <a href="<?php echo Yii::app()->baseUrl.'/' ?>" ><img width="123" src="<?php echo $this->baseUrl.'/images/logo.png' ?>" /></a>
                    <a href="<?php echo Yii::app()->baseUrl.'/' ?>" ><img width="24" src="<?php echo $this->baseUrl.'/images/setting.png' ?>" /></a>
                </div>
                <div class="searchMain">
                    <div class="img-search"></div>
                    <input type="text" class="nostyle" placeholder="Search"></input>
                    <select class="nostyle pull-right" id="selectSearch">
                        <option>Bình Dương</option>
                        <option>Đà Nẵng</option>
                        <option>Hà Nội</option>
                        <option>Hồ Chí Minh</option>
                    </select>
                        <!-- <a class="visualButton" data-id-select="selectSearch" style="margin-left: 10px;" onclick="visualButton(this)" href="javascript:void(0)"></a> -->
                </div>
                <a href="#" class="finTopMenu pull-left">
                    <img width="37" src="<?php echo $this->baseUrl.'/images/search_icon.png' ?>" />
                </a>
            </div>
            <?php $this->renderPartial('/layouts/top-login') ?>
            <div class="clearfix"></div>
        </div>
    </header>
    <div class="wrapper">
        <?php echo $content ?>
    </div>
</body>
</html>