<?php

namespace backend\modules\seller\modules\catalog\modules\attributes\controllers;

use yii\web\Controller;

/**
 * Default controller for the `attributes` module
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
