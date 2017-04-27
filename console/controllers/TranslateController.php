<?php

namespace console\controllers;

use yii\console\Controller;
use yii\data\SqlDataProvider;

// php yii translate -db_name=winkelor_db -lang_table_name=languages -shorter_length=4

class TranslateController extends Controller
{
    // Назва бази даних
    public $db_name;
    // Назва таблиці мов
    public $lang_table_name;
    // число символів у лексем що скорочуються
    public $shorter_length;
    // ковертор типів
    public $types_arr = [
        'bigint(20)' => 'bigInteger',
        'int(11)' => 'integer',
    ];

    public function options($actionID)
    {
        return ['db_name', 'lang_table_name', 'shorter_length'];
    }

    public function optionAliases()
    {
        return [
            'db_name' => 'db_name',
            'lang_table_name' => 'lang_table_name',
            'shorter_length' => 'shorter_length'
            ];
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
            
            if($table_name == $this->lang_table_name)
                continue;

            $columns = $this->getColumns($db_name, $table_name);
            $tables_columns[$table_name]['keyType'] =  $columns[0]["Type"]; // 'bigint(20)' 'int(11)'

            foreach ($columns as $k => $c)
                if(stripos($columns[$k]["Type"], "varchar") === (int) 0)
                    $tables_columns[$table_name][$columns[$k]["Field"]] = "string";
        }

        $count = count($tables_columns);
        $ti = 0; // table iterator
        echo "\n";
        foreach ($tables_columns as $table_name => $column)
        {
            echo ++$ti . " from " . $count . " tables. " . "\n";
            $fields = "";
            $i = 0;
            foreach ($column as $column_name => $column_type)
            {
                $coma = ($i++ > 0) ? ",":"";
                $fields .= "{$coma}{$column_name}:{$column_type}";
            }

            $key_type = $this->types_arr[$tables_columns[$table_name]['keyType']];
            $table_name_short = $this->getShortTableName($table_name, $this->shorter_length);
            $cmd = "php yii migrate/create create_trans_{$table_name_short}_table --fields=\"lang_id:integer:notNull:foreignKey({$this->lang_table_name}),{$table_name_short}_id:{$key_type}:defaultValue(1):foreignKey,{$fields}\"";
            $this->runConsole($cmd);
        }

    }
}