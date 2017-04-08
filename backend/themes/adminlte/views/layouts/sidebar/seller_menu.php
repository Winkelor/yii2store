<?php
use yii\helpers\Url;
?>
<li class="header">Seller</li>
<li><a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Orders</span></a></li>
<li class="treeview">
    <a href="<?= Url::toRoute(['/admin']) ?>"><i class="fa fa-folder"></i> <span>Catalog</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
    <ul class="treeview-menu">
        <li><a href="#">Products</a></li>
        <li><a href="#">Categories</a></li>
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
<li><a href="<?= Url::toRoute(['/site/index', 'lang' => 'uk', 'country' => 'ua']) ?>"><i class="fa fa-folder"></i> <span>Site UK UA </span></a></li>


