<?php
// Side bar menu
$this->widget('widgets.NBADMenu', array(
    'activateParents' => true,
    'htmlOptions' => array( 'class' => 'navigation' ) ,
    'items' => array(
                    // dashboard
                     array( 
                            'label' => Yii::t('adminglobal', 'Dashboard'), 
                            'url' => array('index/index'),
                            'icon' => 'isw-grid'
                          ),
                     // System
                     array( 
                            'label' => Yii::t('adminglobal', 'System'), 
                            'url' => array('settings/index'),
                            'icon' => 'isw-settings',
                            'itemOptions' => array( 'class' => 'openable' ),
                            'items' => array(
                                    array( 
                                            'label' => Yii::t('adminglobal', 'Manage Settings'), 
                                            'url' => array('settings/index'),
                                            'icon' => 'icon-wrench'
                                         ),
                                    array( 
                                            'label' => Yii::t('adminglobal', 'Manage Upselling'), 
                                            'url' => array('upsellingpackages/index'),
                                            'icon' => 'icon-globe'
                                         ),/*
                                         array(
                                            'label' => Yii::t('adminglobal', 'Manage Languages'),
                                            'visible' => Yii::app()->user->checkAccess('op_lang_translate'),
                                            'url' => array('languages/index'),
                                            'icon' => 'icon-globe'
                                         ),*/
                                         array( 
                                            'label' => Yii::t('adminglobal', 'Manage Pages'), 
                                            'url' => array('custompages/index'),
                                            'icon' => 'icon-file'
                                        ),
                                        array(
                                            'label' => Yii::t('adminglobal', 'Email Template'),
                                            'url' => array('EmailTemplates/index'),
                                            'icon' => 'icon-globe'
                                        ),
                                    ),  
                         ),
                         
                         
                     array(
                            'label' => Yii::t('adminglobal', 'Board'), 
                            'url' => array('/admin/board'),
                            'icon' => 'isw-calendar',
                            /*'itemOptions' => array( 'class' => 'openable' ),
                            'items' => array(
                                            array( 
                                                    'label' => Yii::t('adminglobal', 'Manager Board'), 
                                                    'url' => array('board/index'),
                                                    'icon' => 'icon-list'
                                            ),
                                            array( 
                                                    'label' => Yii::t('adminglobal', 'Buzzer'), 
                                                    'url' => array('buzzer/index'),
                                                    'icon' => 'icon-film'
                                            )
                            ),  */
                        ),
                      // Videos
                     /*array( 
                            'label' => Yii::t('adminglobal', 'Videos'), 
                            'url' => array('videos/index'),
                            'icon' => 'isw-cloud',
                            'itemOptions' => array( 'class' => 'openable' ),
                            'items' => array(
                                    array( 
                                            'label' => Yii::t('adminglobal', 'Manage Videos'),
                                            'url' => array('videos/index'),
                                            'icon' => 'icon-film'
                                         ),
                                    array( 
                                            'label' => Yii::t('adminglobal', 'Manage Mirror Links'),
                                            'url' => array('videos/mirrorlinks'),
                                            'icon' => 'icon-tasks'
                                        ),
                                    array( 
                                            'label' => Yii::t('adminglobal', 'Manage Videos Comments'),
                                            'url' => array('videos/comments'),
                                            'icon' => 'icon-comment'
                                         ),
                                    array( 
                                            'label' => Yii::t('adminglobal', 'Manage Videos Genres'),
                                            'url' => array('videogenres/index'),
                                            'icon' => 'icon-tags'
                                         ),
                                    array( 
                                            'label' => Yii::t('adminglobal', 'Report Not Working'),
                                            'url' => array('videos/notworking'),
                                            'icon' => 'icon-warning-sign'
                                         ),
                                    ),  
                         ),
                         
                         */
                    /*array(
                            'label' => Yii::t('adminglobal', 'Manage Blogs'),
                            'url' => array('blog/index'),
                            'icon' => 'isw-documents',
                            'visible' => ( Yii::app()->user->checkAccess('op_settings_view_settings') || Yii::app()->user->checkAccess('op_lang_translate') ),
                            'itemOptions' => array( 'class' => 'openable' ),
                            'items' => array(
                                    array(
                                        'label' => Yii::t('adminglobal', 'Manage Blogs'),
                                        'visible' => Yii::app()->user->checkAccess('op_custompages_managepages'),
                                        'url' => array('blog/index'),
                                        'icon' => 'icon-book'
                                    
                                    ),
                                    
                                    array(
                                        'label' => Yii::t('adminglobal', 'Manage Comments'),
                                        'visible' => Yii::app()->user->checkAccess('op_custompages_managepages'),
                                        'url' => array('blog/comments'),
                                        'icon' => 'icon-align-left'
                                    
                                    ),
                            ),
                     ),*/
                     // Members
                     array( 
                            'label' => Yii::t('adminglobal', 'Members'), 
                            'url' => array('members/index'),
                            'icon' => 'isw-users',  
                          ),
                          
                    
                    // Contact Us       
                     array( 
                                    'label' => Yii::t('adminglobal', 'Contact & Newsletter'), 
                                    'url' => array('contactus/index'), 
                                    'icon' => 'isw-mail',
                                    'itemOptions' => array( 'class' => 'openable' ),
                                    'items' => array(
                                        array( 
                                                'label' => Yii::t('adminglobal', 'Contact Us'), 
                                                'url' => array('contactus/index'),
                                                'icon' => 'icon-comment'
                                             ),
                                             array( 
                                                'label' => Yii::t('adminglobal', 'Manage Newsletters'), 
                                                'url' => array('newsletter/index'),
                                                'icon' => 'icon-envelope'
                                             ),
                                        ),
                          ),
                )
));
?>