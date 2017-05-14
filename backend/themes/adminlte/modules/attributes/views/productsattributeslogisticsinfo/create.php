<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductsAttributesLogisticsInfo */

$this->title = Yii::t('products_attributes_logistics_info', 'Create Products Attributes Logistics Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('products_attributes_logistics_info', 'Products Attributes Logistics Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-attributes-logistics-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
