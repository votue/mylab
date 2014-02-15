<?php
/*root config*/
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('docroot', dirname(__FILE__).DIRECTORY_SEPARATOR.'../..'); 

// Required system configuration. There should be no edit performed here.
return array(
        'preload' => array('log', 'session', 'db', 'cache'),
        'basePath' => ROOT_PATH . 'protected/',
        'modules' => array(
            'admin' => array(
                'import' => array('admin.components.*'),
                'layout' => 'main'
            ),
            'site' => array(
                'import' => array('site.components.*'),
                'layout' => 'main'
            ),
            'gii'=>array(
                'class'=>'system.gii.GiiModule',
                'password'=>'admin123',
            ),
            /*'gii'=>array(
                'generatorPaths'=>array(
                    'bootstrap.gii',
                ),
            ), */
        ),
        'import' => array(
            'application.components.*',
            'application.models.*',
            'application.extensions.*',
            'ext.easyimage.EasyImage',
        ),
        'theme' => 'default',
        'name' => 'YiiLab',
        'defaultController' => 'site/index',
        'layout' => 'main',
        'charset'=>'UTF-8',
        'sourceLanguage' => 'en',
        'language' => 'en',
        'params' => require(dirname(__FILE__) . '/params.php'),
        'aliases' => array(
            'helpers' => 'application.widgets',
            'widgets' => 'application.widgets',
        ),
        'components' => array(
            'format' => array(
                'class' => 'CFormatter',
            ),
            'errorHandler'=>array(
                'errorAction'=>'site/error/error',
            ),
            'authManager'=>array(
                'class'=>'AuthManager',
                'connectionID'=>'db',
                'itemTable' => 'authitem',
                'itemChildTable' => 'authitemchild',
                'assignmentTable' => 'authassignment',
                'defaultRoles'=>array('guest'),
            ),
            'user'  => array(
                'class' => 'CustomWebUser',
                'allowAutoLogin' => true,
                'autoRenewCookie' => true,
                'identityCookie' => array('domain' =>''),
            ),
            'messages' => array(
                'class' => 'CDbMessageSource',
                'cacheID' => 'cache',
            ),
            'urlManager' => array(
                'class' => 'CustomUrlManager',
                'urlFormat' => 'path',
                'cacheID' => 'cache',
                'showScriptName' => false,
                'appendParams' => true,
                'urlSuffix' => ''
            ),
            'bootstrap' => array(
                'class' => 'ext.bootstrap.components.Bootstrap',
                'responsiveCss' => true,
            ),
            'request' => array(
                'class' => 'CHttpRequest',
                'enableCookieValidation' => true,
            ),
            'session' =>  array(
                'class' => 'CDbHttpSession',
                'sessionTableName' => 'sessions',
                'connectionID' => 'db',
                'cookieParams' => array('domain' => '' ),
                'timeout' => 3600,
                'sessionName' => 'SECSESS',
            ),
            'EasyImage' => array(
                'class' => 'application.extensions.easyimage.EasyImage',
            ),
            'utils'=>array('class'=>'Utils'),
        ),        
);
