<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductsAttributesLogisticsInfoStatuses */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('products_attributes_logistics_info_statuses', 'Products Attributes Logistics Info Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-attributes-logistics-info-statuses-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('products_attributes_logistics_info_statuses', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('products_attributes_logistics_info_statuses', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('products_attributes_logistics_info_statuses', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'comment',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
