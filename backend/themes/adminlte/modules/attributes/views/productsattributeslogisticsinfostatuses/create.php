<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductsAttributesLogisticsInfoStatuses */

$this->title = Yii::t('products_attributes_logistics_info_statuses', 'Create Products Attributes Logistics Info Statuses');
$this->params['breadcrumbs'][] = ['label' => Yii::t('products_attributes_logistics_info_statuses', 'Products Attributes Logistics Info Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-attributes-logistics-info-statuses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
