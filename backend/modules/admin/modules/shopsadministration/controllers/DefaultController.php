<?php

namespace backend\modules\admin\modules\shopsadministration\controllers;

use yii\web\Controller;

/**
 * Default controller for the `shopsadministration` module
 */
class DefaultController extends Controller
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
