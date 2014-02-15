<?php
/**
 * Index controller Home page
 */
class IndexController extends SiteBaseController {
    
    const PAGE_SIZE = 5;
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
