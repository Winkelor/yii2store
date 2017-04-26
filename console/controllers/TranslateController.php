<?php

namespace console\controllers;

use yii\console\Controller;
use yii\data\SqlDataProvider;

// php yii translate -db_name=winkelor_db

class TranslateController extends Controller
{
    public $db_name;

    public function options($actionID)
    {
        return ['db_name'];
    }

    public function optionAliases()
    {
        return ['db_name' => 'db_name'];
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

    public function runConsole($cmd)
    {
        echo "\n" . $cmd . "\n";
        $handle = popen($cmd, 'r');
//        echo "'$handle'; " . gettype($handle) . "\n";
        $read = fread($handle, 2096);
        echo $read;
        pclose($handle);
    }

    public function getShortTableName($name, $length_shn)
    {
        $arr = explode("_", $name);
        $short_name = "";
        foreach ($arr as $k => $v)
            $short_name .= ($k == 0)? $v : "_" . substr($v, 0, $length_shn);

        return $short_name;
    }

    public function actionIndex()
    {
        $db_name = $this->db_name;
        $tables = $this->getTables($db_name);
        $tables_columns = [];

        foreach ($tables as $k => $t)
        {
            $table_name = $tables[$k]["Tables_in_{$db_name}"];
            $columns = $this->getColumns($db_name, $table_name);
            foreach ($columns as $k => $c)
                if(stripos($columns[$k]["Type"], "varchar") === (int) 0)
                    $tables_columns[$table_name][$columns[$k]["Field"]] = "string";
        }


        foreach ($tables_columns as $table_name => $column)
        {
            $fields = "";
            $i = 0;
            foreach ($column as $column_name => $column_type)
            {
                $coma = ($i++ > 0) ? ",":"";
                $fields .= "{$coma}{$column_name}:{$column_type}";
            }
            $table_name_short = $this->getShortTableName($table_name, 4);
            //$cmd = "php yii migrate/create trans_{$table_name_short} --fields=\"lang_id:integer:notNull:foreignKey(languages),{$table_name_short}_id:integer:notNull:foreignKey({$table_name}),{$fields}\"";

            $cmd = "php yii migrate/create create_trans_{$table_name_short}_table --fields=\"lang_id:integer:notNull:foreignKey(languages),{$table_name_short}_id:integer:defaultValue(1):foreignKey,title:string,body:text\"";

//            echo "\n" . "$cmd" . "\n";
            // php yii translate -db_name=winkelor_db
            $this->runConsole($cmd);

        }

    }
}