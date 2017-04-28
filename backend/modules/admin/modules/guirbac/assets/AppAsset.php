<?php
namespace backend\modules\admin\modules\guirbac\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $sourcePath = '@vendor/githubjeka/yii2-gui-rbac/web/';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        "js/app.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'githubjeka\rbac\assets\D3TipAsset',
    ];
}
