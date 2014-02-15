<?php
/**
 * WidgetRoom controller Home page
 */
class WidgetRoomController extends SiteBaseController {
    
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

    public function actionGetStaticData(){
        /*$data = array('choice-1','choice-2','choice-3');*/

        echo '[ { "label": "Choice1", "value": "value1" }, { "label": "Choice2", "value": "value2" } ]';
        return true;
    }
}
