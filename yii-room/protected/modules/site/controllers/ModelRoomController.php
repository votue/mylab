<?php
/**
 * ModelRoom controller Home page
 */
class ModelRoomController extends SiteBaseController {
    
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
