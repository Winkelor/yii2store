<?php

use backend\components\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AttributesProducts */

$this->title = Yii::t('attributes_products', 'Update {modelClass}: ', [
    'modelClass' => 'Attributes Products',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('attributes_products', 'Attributes Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('attributes_products', 'Update');
?>
<div class="attributes-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
