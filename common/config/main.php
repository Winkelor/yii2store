<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=winkelor.mysql.ukraine.com.ua;dbname=winkelor_db',
            'username' => 'winkelor_db',
            'password' => 'BtkqzhL2',
            'charset' => 'utf8',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
