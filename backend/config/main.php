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
        // kartik
        'gridview' => [
            'class' => 'kartik\grid\Module'
        ],
      // admin panel for Winkelor
        'dashboard' => [
            'class' => 'backend\modules\dashboard\dashboard',
            'viewPath' => '@app/themes/adminlte/modules/dashboard/views',
        ],
        'admin' => [
            'class' => 'backend\modules\admin\admin',
            'viewPath' => '@app/themes/adminlte/modules/admin/views',
        ],
        // module for seller
        'seller' => [
            'class' => 'backend\modules\seller\seller',
            'viewPath' => '@app/themes/adminlte/modules/seller/views',
        ],
//        # RBAC GUI
//      'rbac' => [
//            'class' => 'githubjeka\rbac\GUIRBAC',
//            'as access' => [ // if you need to set access
//            'class' => 'yii\filters\AccessControl',
//            'rules' => [
//               [
//                   'allow' => true,
//                   'roles' => ['@'] // all auth users
//               ],
//             ]
//            ]
//          ],
//       # RBAC
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'i18n' => [
            'translations' => [
                '*' => [ // * за все відповідає
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [ // дивно
//                        'app' => 'app.php',
//                        'app/error' => 'error.php',
//                        'user' => 'user.php',
                      ],
                ],
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
            'identityClass' => 'common\models\UserAdmin',
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
                    'name' => 'lang_country',
                    'pattern' => '<lang:\w+>-<country:\w+>/<controller>/<action>',
                    'route' => '<controller>/<action>',
                    //'defaults' => ['lang' => 'en', 'country' => 'US'], // если стоит это, то потом оно не попадает в ссылки почему-то О_О
                    //'suffix' => '.html',
                ],
                [
                    'name' => 'lang_country_module',
                    'pattern' => '<lang:\w+>-<country:\w+>/<module>/<controller>/<action>',
                    'route' => '<module>/<controller>/<action>',
                ],
                [
                    'name' => 'lang_country_module2',
                    'pattern' => '<lang:\w+>-<country:\w+>/seller/catalog/attributes/<module>/<controller>/<action>',
                    'route' => 'seller/catalog/attributes/<module>/<controller>/<action>',
                ],
//                [
//                    'name' => 'lang_country_module2',
//                    'pattern' => '<lang:\w+>-<country:\w+>/(?J)<module>/<controller>/<action>',
//                    'route' => '<module>/<controller>/<action>',
//                ],
                [
                    'name' => 'lang_country_module_only',
                    'pattern' => '<lang:\w+>-<country:\w+>/<module>',
                    'route' => '<module>',
                ],

                [ // http://yii2store/backend/web/en-us/seller/catalog/attributes/attributesproducts
                    'name' => 'lang_country_module_only_2',
                    'pattern' => '<lang:\w+>-<country:\w+>/seller/catalog/attributes/<module>',
                    'route' => 'seller/catalog/attributes/<module>',
                ],

//                [
//                    //якщо вказаний тільки модуль
//                    'name' => 'lang_country_module_only2',
//                    'pattern' => '<lang:\w+>-<country:\w+>/(?J)<module>',
//                    'route' => '<module>',
//                ],
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

        // get en or US from en-US
        'cultureManager' => [
            'class' => 'backend\components\MyComponents\cultureManager',
        ],

        # моя поведінка
        'MyBehavior' => [
            'class' => 'backend\components\behaviors\MyBehavior',
        ],

    ],
    'params' => $params,
];
