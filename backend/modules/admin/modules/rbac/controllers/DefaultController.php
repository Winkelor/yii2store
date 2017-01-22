<?php

namespace backend\modules\admin\modules\rbac\controllers;
use Yii;
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
        $role = Yii::$app->authManager->createRole('admin');
        $role->description = 'Админ';
        Yii::$app->authManager->add($role);

        $role = Yii::$app->authManager->createRole('user');
        $role->description = 'Юзер';
        Yii::$app->authManager->add($role);

        return $this->render('index');
    }
}
