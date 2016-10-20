<?php

namespace backend\modules\winkelor\modules\rbac\controllers;

class DefaultController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
