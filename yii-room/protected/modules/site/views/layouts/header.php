<!DOCTYPE html>
<!--[if IE 8 ]> <html lang="<?php echo Yii::app()->language; ?>" class="ie8"> <![endif]-->
<!--[if (gt IE 8)]><!--> <html lang="<?php echo Yii::app()->language; ?>"> <!--<![endif]-->
<head>
    <meta charset="<?php echo Yii::app()->charset; ?>">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />

    
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php 
        //register script and style
        $cs = Yii::app()->getClientScript();
        
        //registry css
        $fileCss = array(
            $this->baseUrl.'/css/reset.css',
            $this->baseUrl.'/css/font-awesome.css',
            $this->baseUrl.'/css/imgareaselect-default.css',            
            $this->baseUrl.'/css/bootstrap.css',
            $this->baseUrl.'/css/bootstrap-responsive.css',
            $this->baseUrl.'/css/bootstrap-tagsinput.css',
            //$this->baseUrl.'/css/jquery.bxslider.css',  
            $this->baseUrl.'/css/darkstrap.css',          
            $this->baseUrl.'/css/styles.css',            
        );
        foreach($fileCss as $file){
            $cs->registerCssFile($file); 
        }

        //registry js
        $fileJs = array(
            $this->baseUrl . '/js/bootstrap.min.js',
            $this->baseUrl . '/js/bootstrap-tagsinput.min.js',
            $this->baseUrl . '/js/jquery.bxslider.min.js',
            $this->baseUrl . '/js/jquery.imgareaselect.min.js',
            $this->baseUrl . '/js/script.js',
            $this->baseUrl . '/js/userScript.js',
            $this->baseUrl . '/js/smallPiece.js',
        );
        foreach($fileJs as $file){
            $cs->registerScriptFile($file);
        }
    ?>
    <!-- difine global var for js file -->
    <script type="text/javascript">
        var baseUrl = "<?php echo Yii::app()->baseUrl ?>";
        var isGuest = <?php echo Yii::app()->user->isGuest?'true':'false' ?>
    </script>
</head>