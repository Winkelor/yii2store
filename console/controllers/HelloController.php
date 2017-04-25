<?php

namespace console\controllers;

use yii;
use yii\console\Controller;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;

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

    public function makeSql($sql)
    {
        // http://www.yiiframework.com/doc-2.0/guide-output-data-providers.html
        $provider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => false,
            'pagination' => false,
        ]);
        $models = $provider->getModels();
        return $models;
    }

    public function getTables($db_name)
    {
        return $this->makeSql("SHOW FULL TABLES FROM {$db_name}");
    }

    public function getColumns($db_name, $table_name)
    {
        return $this->makeSql("SHOW FULL COLUMNS FROM {$table_name} FROM {$db_name}");
    }

    public function getKeys($db_name, $table_name)
    {
        return $this->makeSql("
            SELECT 
              TABLE_NAME,COLUMN_NAME,CONSTRAINT_NAME, REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME
            FROM
              INFORMATION_SCHEMA.KEY_COLUMN_USAGE
            WHERE
              REFERENCED_TABLE_SCHEMA = '{$db_name}' AND
              REFERENCED_TABLE_NAME = '{$table_name}'
        ");
    }

    public function actionIndex()
    {
        echo "All STRING COLUMNS: ". "\n";
        $db_name = "winkelor_db";
        $tables = $this->getTables($db_name);

        foreach ($tables as $k => $t)
        {
            echo "TABLE: " . $table_name = $tables[$k]["Tables_in_winkelor_db"] . "\n". "\n";
            $columns = $this->getColumns($db_name, $table_name);

            foreach ($columns as $k => $c)
            {
                $pos = stripos($columns[$k]["Type"], "varchar");
//                echo $columns[$k]["Type"] . " ";
//                echo "varchar ";
//                echo "POS: {$pos} " . "\n";
                if($pos === (int) 0)
                {
                    echo $columns[$k]["Field"] . "\n";
                    // make migration command here!
                    // yii migrate/create create_post_table --fields="author_id:integer:notNull:foreignKey(user),category_id:integer:defaultValue(1):foreignKey,title:string,body:text"
                }
            }
            echo "==========================" . "\n";
            echo "\n";
        }

    }
}