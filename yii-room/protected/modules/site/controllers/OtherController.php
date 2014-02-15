<?php
/**
 * OtherRoom controller Home page
 */
class OtherRoomController extends SiteBaseController {
    
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
