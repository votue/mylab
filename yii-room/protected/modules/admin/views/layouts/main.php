<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title><?php echo implode( ' - ', $this->pageTitle ); ?></title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    <?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/css/stylesheets.css', 'screen' ); ?>
    <?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/css/fullcalendar.print.css', 'print' ); ?>
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    <!--[if lt IE 8]>
        <link href="<?php // echo Yii::app()->themeManager->baseUrl; ?>/css/ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script type="text/javascript">
        /*var themeUrl = '<?php echo Yii::app()->themeManager->baseUrl; ?>';
        var _languages = {
            'deletePrompt': '<?php echo Yii::t('adminglobal', 'Are you sure you want to delete this item?\nThis action cannot be undone!'); ?>',
            'deleteAborted': '<?php echo Yii::t('adminglobal', 'OK! Action Cancled.'); ?>'
        };
        
        $(document).ready(function(){
            setTimeout(function(){$("div.alert-error, div.alert-attention, div.alert-success").slideUp(400)}, 5000);
        });*/
    </script>
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl .'/js/bootstrap-datepicker.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl .'/js/bootstrap.min.js' ); ?>

    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/jquery/jquery.mousewheel.min.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/cookie/jquery.cookies.2.2.0.min.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/dataTables/jquery.dataTables.min.js' ); ?>    
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/actions.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/settings.js' ); ?>    
    
    
    <?php if( Yii::app()->locale->getOrientation() == 'rtl' )
    {
        Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/css/rtl.css', 'screen' );
    } ?>
</head>
<body>
    <div class="wrapper"> 
            
        <div class="header">
            <a class="logo" href="<?php echo $this->createUrl('index/index', array('lang'=>false)); ?>"><img style="height:24px;" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/../../default/images/logo.png" alt="Admin Panel" title="Admin Panel"/></a>
             
        </div>
        
        <div class="menu">
            <div class="breadLine">            
                <div class="arrow"></div>
                <div class="adminControl active">
                    Hi, <?php echo Yii::app()->user->name; ?>
                </div>
            </div>

            <div class="admin">
                
                <ul class="control">                
                    <li><span class="icon-refresh"></span> <a href="#" onclick="window.location.href=window.location.href">Refresh</a></li>
                    <li><span class="icon-globe"></span> <a target="_blank" href="<?php echo Yii::app()->homeUrl; ?>">View site</a></li>
                    <li><span class="icon-user"></span>
                        <a href="/admin/members/changepass">Change password</a>
                    </li>
                    <li><span class="icon-share-alt"></span> <a href="<?php echo $this->createUrl('/logout', array('lang'=>false)); ?>">Logout</a></li>
                    
                </ul>
            </div>
            
            <?php $this->widget('widgets.admin.sidebar'); ?>
            
            <div class="dr"><span></span></div>

            
        </div>
        
        <div class="content">
            
            <noscript> <!-- Show a notification if the user has disabled javascript -->
                <div class="notification error png_bg">
                    <div>
                        <?php echo Yii::t('adminglobal', 'Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.'); ?>
                    </div>
                </div>
            </noscript>
            
            <div class="breadLine">

                <ul class="breadcrumb">
                    <?php
                    $links = array();
                    $links[] = CHtml::link(Yii::t('adminglobal', 'Home'), '/admin');
                    if(count($this->breadcrumbs))
                    {
                        foreach($this->breadcrumbs as $label=>$url)
                        {
                            if(is_string($label) || is_array($url))
                                $links[] = CHtml::link($label, $url);
                            else
                                $links[] = '<a>'.$label.'</a>';
                        }
                    }
                    echo '<li>' . implode(' <span class="divider">></span></li>', $links) . '</li>';
                    ?>
                </ul>
            </div>
            
            <div class="workplace">
                <div class="row-fluid">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>