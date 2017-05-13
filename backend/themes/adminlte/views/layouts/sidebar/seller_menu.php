<?php
//use yii\helpers\Url;
use backend\components\Helpers\Url;

?>
<li class="header">Seller</li>
<li class="treeview">
    <a href="<?= Url::toRoute(['/seller/myshop']) ?>"><i class="fa fa-folder"></i> <span>My Shops</span></a>
    <ul class="treeview-menu">
        <li><a href="#">My Shop Info</a></li>
        <li><a href="#">My Shop Info</a></li>
    </ul>
</li>
<li><a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Orders</span></a></li>
<li class="treeview">
    <a href="<?= Url::toRoute(['/seller/catalog']) ?>"><i class="fa fa-folder"></i> <span>Catalog</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
    <ul class="treeview-menu">
        <li><a href="<?= Url::toRoute(['/seller/catalog/products']) ?>">Products</a></li>
        <li><a href="<?= Url::toRoute(['/seller/catalog/categories']) ?>">Categories</a></li>
        <li class="treeview">
            <a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Attributes</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                <li><a href="#">Products</a></li>
                <li><a href="#">Categories</a></li>
            </ul>

    </ul>
</li>
<li><a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Shipping</span></a></li>
<li><a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Customers</span></a></li>
<li><a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Analytics</span></a></li>
<li><a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Managers</span></a></li>
<?php /*  срань: <li><a href="<?= Url::base() . '/' . "uk-UA" . '/site/index' ?>"><i class="fa fa-folder"></i> <span>LALAKA</span></a></li> */ ?>
<li><a href="<?= Url::toRoute([
        '/site/index',
        'lang' => Yii::$app->request->get('lang'),
        'country' => Yii::$app->request->get('country'),
    ]) ?>"><i class="fa fa-folder"></i> <span>Site <?= Yii::$app->language ?></span></a></li>

<li><a href="<?= Url::toRoute(['/site/index'])?>"><i class="fa fa-folder"></i> <span>My Helper Site <?= Yii::$app->language ?></span></a></li>
<li><a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Kurwa </span></a></li>

