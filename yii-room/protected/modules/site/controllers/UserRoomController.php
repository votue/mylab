<?php
/**
 * UserRoom controller Home page
 */
class UserRoomController extends SiteBaseController {
    
    /**
     * Controller constructor
     */
    public function init()
    {
        parent::init();
    }

    public function actionIndex() {
        return $this->render('index');
    }
}
