<?php

use backend\components\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AttributesGroups */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('attributes_groups', 'Attributes Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attributes-groups-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('attributes_groups', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('attributes_groups', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('attributes_groups', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'shop_id',
            'category_id',
            'name',
            'description',
            'rank',
            'is_active',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>