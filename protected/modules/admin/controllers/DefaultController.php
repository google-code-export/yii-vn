<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $pathViews = Yii::app()->getModule('admin')->getBasePath().'\views';
        $this->render('index',
                array(
                    'dir'=>$pathViews
                    )
                );
    }

}