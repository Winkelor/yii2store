<?php
use backend\assets\AdminlteAsset;
use yii\helpers\Html;
use yii\helpers\Url;
$assets = AdminlteAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <title><?= Html::encode($this->title) ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?= /* load assets */ Html::csrfMetaTags() ?>
    <?php $this->head() ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">

    <?php echo $this->render('header', ['assets' => $assets, ]); ?>

    <?php echo $this->render('sidebar', ['assets' => $assets, ]); ?>

    <?php echo $this->render('contentwrapper', ['assets' => $assets, 'content' => $content, ]); ?>

    <?php echo $this->render('footer'); ?>

    <?php echo $this->render('controlsidebar'); ?>

</div>

</body>
<?php $this->endBody() ?>
</html>

<?php $this->endPage() ?>
