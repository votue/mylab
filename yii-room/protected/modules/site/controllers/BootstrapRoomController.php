<?php
/**
 * BootstrapRoom controller Home page
 */
class BootstrapRoomController extends SiteBaseController {
    
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
