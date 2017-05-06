<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    function init() {
        parent::init();
        Yii::$app->cultureManager->makeCulture();
    }
}
