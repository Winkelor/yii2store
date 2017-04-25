<?php

namespace console\controllers;

use yii;
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
        echo "LOLOLO". "\n";

        $sql = "SHOW FULL TABLES FROM winkelor_db;";
        $query = Yii::$app->db->createCommand($sql)/*->execute()*/;
        var_dump($query->all());

        echo $message . "\n";
    }
}