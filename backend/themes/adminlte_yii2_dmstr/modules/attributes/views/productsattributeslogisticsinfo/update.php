<?php

use backend\components\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductsAttributesLogisticsInfo */

$this->title = Yii::t('products_attributes_logistics_info', 'Update {modelClass}: ', [
    'modelClass' => 'Products Attributes Logistics Info',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('products_attributes_logistics_info', 'Products Attributes Logistics Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('products_attributes_logistics_info', 'Update');
?>
<div class="products-attributes-logistics-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
