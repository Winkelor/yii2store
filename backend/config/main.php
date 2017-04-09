<?php
require(__DIR__ . '/url-rules.php');

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
      // admin panel for Winkelor
      'admin' => [
            'class' => 'backend\modules\admin\Admin',
        ],
        # RBAC GUI
      'rbac' => [
            'class' => 'githubjeka\rbac\Module',
            'as access' => [ // if you need to set access
            'class' => 'yii\filters\AccessControl',
            'rules' => [
               [
                   'allow' => true,
                   'roles' => ['@'] // all auth users
               ],
             ]
            ]
          ],
       # RBAC
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'i18n' => [
            'translations' => [
                '*' => [ // * за все відповідає
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [ // дивно
//                        'app' => 'app.php',
//                        'app/error' => 'error.php',
//                        'user' => 'user.php',
                      ],
                ],
//                'user' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
//                    'basePath' => '@app/messages',
//                    'sourceLanguage' => 'en-US',
//                    'fileMap' => [
//                        'user' => 'user.php',
//                        //'app' => 'app.php',
//                        //'app/error' => 'error.php',
//                    ],
//                ],
            ],
        ],
        /*'assetManager' => [
            'linkAssets' => true,
        ],*/
        'view' => [
            'theme' => [ /* https://yiiframework.com.ua/ru/doc/guide/2/output-theming/ */
                'basePath' => '@app/themes/adminlte',
                'baseUrl' => '@web/themes/adminlte',
                'pathMap' => [
                    '@app/views' => '@app/themes/adminlte/views',
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'backend\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            /*'baseUrl' => '/backend/web',*/
            'rules' => [
                // your rules go here
                // Yii2 by Examples, p65
                // https://msdn.microsoft.com/en-us/library/ee825488(v=cs.20).aspx
                [
                    // Lang rule
                    // головне правило
                    'name' => 'lang_country',
                    'pattern' => '<lang:\w+>-<country:\w+>/<controller>/<action>',
                    'route' => '<controller>/<action>',
                    //'defaults' => ['lang' => 'en', 'country' => 'US'], // если стоит это, то потом оно не попадает в ссылки почему-то О_О
                    //'suffix' => '.html',
                ],
                [
                    // якщо є модулі
                    'name' => 'lang_country_module',
                    'pattern' => '<lang:\w+>-<country:\w+>/<module>/<controller>/<action>',
                    'route' => '<module>/<controller>/<action>',
                ],
                [
                    //якщо вказаний тільки модуль
                    'name' => 'lang_country_module_only',
                    'pattern' => '<lang:\w+>-<country:\w+>/<module>',
                    'route' => '<module>/default/index',
                ],
//                [
//                    // Culture
//                    // https://msdn.microsoft.com/en-us/library/ee825488(v=cs.20).aspx
//                    'name' => 'culture',
//                    'pattern' => '<culture:\w+>/<controller>/<action>',
//                    'route' => '<controller>/<action>',
//                    'defaults' => ['culture' => 'en-US'],
//                    //'suffix' => '.html',
//                ],
            ],
        ],

        # моя поведінка
        'MyBehavior' => [
            'class' => 'backend\components\behaviors\MyBehavior',
        ],

    ],
    'params' => $params,
];
