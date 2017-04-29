<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminlteAsset extends AssetBundle
{
    public $basePath = '@webroot/adminlte';
    public $baseUrl = '@web/adminlte';

    public $css = [
        /* Bootstrap 3.3.6 */
        'bootstrap/css/bootstrap.min.css',
        /* Font Awesome */
        'css/font-awesome.min.css',
        /* Ionicons */
        'css/ionicons.min.css',
        /* Theme style */
        'dist/css/AdminLTE.min.css',
        /* AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        */
        'dist/css/skins/skin-blue.min.css',

//        'css/guirbac.css', // GUIRBAC
    ];
    public $js = [
        /* jQuery 2.2.3 */
        'plugins/jQuery/jquery-2.2.3.min.js',
        /* Bootstrap 3.3.6 */
        'bootstrap/js/bootstrap.min.js',
        /* AdminLTE App */
        'dist/js/app.min.js',

//        "js/d3.js", // GUIRBAC
//        "js/d3tip.js", // GUIRBAC
//        "js/guirbac.js", // GUIRBAC
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
//        'githubjeka\rbac\assets\D3Asset', // GUIRBAC
//        'githubjeka\rbac\assets\D3TipAsset', // GUIRBAC
    ];

}
