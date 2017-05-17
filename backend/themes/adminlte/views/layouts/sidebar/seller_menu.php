<?php
//use yii\helpers\Url;
use backend\components\Helpers\Url;

$shop = \Yii::$app->activeShop->getActiveShop();
$shop_id = ($shop != null)? $shop->id : '';

?>
<li class="header">Seller</li>
<li class="treeview">
    <a href="<?= Url::toRoute(['/seller/myshop', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),]) ?>"><i class="fa fa-folder"></i> <span>My Shops</span></a>
    <ul class="treeview-menu">
        <li>
            <a href="<?= Url::toRoute(['/seller/myshop/shops/view?id='.$shop_id, 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),]) ?>"><i class="fa fa-folder"></i> <span>Active Shop</span></a>
        </li>
        <li>
            <a href="<?= Url::toRoute(['/seller/myshop/shops', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),]) ?>"><i class="fa fa-folder"></i> <span>My Shops</span></a>
        </li>
    </ul>
</li>
<li><a href="<?= Url::toRoute(['/admin', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),]) ?>"><i class="fa fa-folder"></i> <span>Orders</span></a></li>
<li class="treeview">
    <a href="<?= Url::toRoute(['/seller/catalog', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),]) ?>"><i class="fa fa-folder"></i> <span>Catalog</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
    <ul class="treeview-menu">
        <li><a href="<?= Url::toRoute(['/seller/catalog/products', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),]) ?>">Products</a></li>
        <li><a href="<?= Url::toRoute(['/seller/catalog/categories', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),]) ?>">Categories</a></li>
        <li class="treeview">
            <a href="<?= Url::toRoute(['/seller/catalog/attributes', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),])?>"><i class="fa fa-folder"></i> <span>Attributes</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                <li><a href="<?= Url::toRoute(['/seller/catalog/attributes/attributesproducts', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),])?>">Products</a></li>
                <li><a href="<?= Url::toRoute(['/seller/catalog/attributes/attributescategories', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),])?>">Categories</a></li>
                <li><a href="<?= Url::toRoute(['/seller/catalog/attributes/attributesgroups', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),])?>">Groups</a></li>
                <li><a href="<?= Url::toRoute(['/seller/catalog/attributes/attributesproductsgroup', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),])?>">Products Group</a></li>
                <li><a href="<?= Url::toRoute(['/seller/catalog/attributes/attributestypes', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),])?>">Types</a></li>
                <li><a href="<?= Url::toRoute(['/seller/catalog/attributes/productsattributeslogisticsinfo', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),])?>">productsattributeslogisticsinfo</a></li>
                <li><a href="<?= Url::toRoute(['/seller/catalog/attributes/productsattributeslogisticsinfostatuses', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),])?>">productsattributeslogisticsinfostatuses</a></li>
            </ul>
    </ul>
</li>
<li><a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Shipping</span></a></li>
<li><a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Customers</span></a></li>
<li><a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Analytics</span></a></li>
<li><a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Managers</span></a></li>
<?php /*  срань: <li><a href="<?= Url::base() . '/' . "uk-UA" . '/site/index' ?>"><i class="fa fa-folder"></i> <span>LALAKA</span></a></li> */ ?>
<li><a href="<?= Url::toRoute(['/site/index', 'lang' => Yii::$app->request->get('lang'), 'country' => Yii::$app->request->get('country'),]) ?>"><i class="fa fa-folder"></i> <span>Site <?= Yii::$app->language ?></span></a></li>
<li><a href="<?= Url::toRoute(['/site/index'])?>"><i class="fa fa-folder"></i> <span>My Helper Site <?= Yii::$app->language ?></span></a></li>
<li><a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Kurwa </span></a></li>

