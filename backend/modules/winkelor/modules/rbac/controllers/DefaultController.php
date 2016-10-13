<?php

namespace backend\modules\winkelor\modules\rbac\controllers;

use yii;
use yii\web\Controller;


/**
 * Default controller for the `rbac` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $isGuest = (Yii::$app->user->isGuest) ? "Гость" : "Не гость";

        $user = false;

        if(!Yii::$app->user->isGuest)
          $user = Yii::$app->user;

        $data = [
          'isGuest' => $isGuest,
          'user'    => $user,
        ];

        return $this->render('index', $data);
    }
}
