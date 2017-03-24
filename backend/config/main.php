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
            'rules' => $urlrules,
        ],
        # моя поведінка
        'MyBehavior' => [
            'class' => 'backend\components\behaviors\MyBehavior',
        ],

    ],
    'params' => $params,
];
