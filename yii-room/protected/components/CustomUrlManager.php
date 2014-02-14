<?php
/**
 * Custom rules manager class
 *
 * Override to load the routes from the DB rather then a file
 *
 */
class CustomUrlManager extends CUrlManager {
    /**
     * Build the rules from the DB
     */
    protected function processRules() {

            $_more = array();
            
            $this->rules = array(

/*              //-----------------------ADMIN--------------
                "/admin" => 'admin/index/index',
                "/admin/<_c:([a-zA-z0-9-]+)>" => 'admin/<_c>/index',
                "/admin/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>" => 'admin/<_c>/<_a>',
                "/admin/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>//*" => 'admin/<_c>/<_a>/',
                
                "/<order:(all|popular)>" => 'site/videos/allvideos',
                "/<_a:(genres|search|new)>" => 'site/videos/<_a>',
                "/<_a:(addmirror|notworking)>/<id:([0-9]+)>" => 'site/videos/<_a>',
                
                "/profile" => 'site/users/index',
                "/<_a:(register|login|logout|verify|socialLogin)>" => 'site/users/<_a>',
                "/admin-login" => 'site/users/admin',
                "/forgot-password" => 'site/users/lostpassword',
                "/change-password" => 'site/users/changepass',
                "/contact-us" => 'site/contactus/index',
                "/messages" => 'site/usermessages/index',
                "/<_a:(viewmessage|sendmessage)>" => 'site/usermessages/<_a>',
                // "/invoices" => 'site/transactions/index',
                // "/buy-a-plan" => 'site/transactions/buyplan',
                // "/<_a:(earning|cashout)>" => 'site/transactions/<_a>',
                // "/<id:(\d+)>-<ualias:(.*?)>/blog/<alias:(.*)>" => array('site/blog/viewpost'),*/
                
                /*"/" => 'site/index/index',*/
                "/<_c:([a-zA-z0-9-]+)>" => 'site/<_c>/index',
                "/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>" => 'site/<_c>/<_a>',
                '/<_c:([a-zA-z0-9-]+)>/<_a:([a-zA-z0-9-]+)>/id/<id:\d+>' => 'site/<_c>/<_a>/',
            );
            
            $urlrules = array_merge( $_more, $this->rules );
            //Yii::app()->cache->set('customurlrules', $urlrules);
        // }
        
        $this->rules = $urlrules;
        
        // Run parent
        parent::processRules();
    }
}
