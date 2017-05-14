<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductsAttributesLogisticsInfoStatuses */

$this->title = Yii::t('products_attributes_logistics_info_statuses', 'Update {modelClass}: ', [
    'modelClass' => 'Products Attributes Logistics Info Statuses',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('products_attributes_logistics_info_statuses', 'Products Attributes Logistics Info Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('products_attributes_logistics_info_statuses', 'Update');
?>
<div class="products-attributes-logistics-info-statuses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
