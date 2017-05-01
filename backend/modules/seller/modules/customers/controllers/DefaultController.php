<?php

namespace backend\modules\seller\modules\customers\controllers;

use backend\controllers\BaseController;
use yii\web\Controller;

/**
 * Default controller for the `customers` module
 */
class DefaultController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
