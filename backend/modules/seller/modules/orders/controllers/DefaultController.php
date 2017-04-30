<?php

namespace backend\modules\seller\modules\orders\controllers;

use backend\controllers\BaseController;
use yii\web\Controller;

/**
 * Default controller for the `orders` module
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
