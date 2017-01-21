<?php

namespace backend\modules\winkelor\modules\admin\controllers;

use Yii;
use yii\web\Controller;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $user = Yii::$app->user;
        return $this->render('index', [
                'user' => $user,
            ]);
    }
}
