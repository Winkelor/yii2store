<?php

namespace console\controllers;

use yii\console\Controller;

class HelloController extends Controller
{
    public $message;

    public function options($actionID)
    {
        return ['message'];
    }

    public function optionAliases()
    {
        return ['m' => 'message'];
    }

    public function actionIndex()
    {
        echo "LOLOLO";
        echo $message . "\n";
    }
}