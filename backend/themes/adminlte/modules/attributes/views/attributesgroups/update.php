<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AttributesGroups */

$this->title = Yii::t('attributes_groups', 'Update {modelClass}: ', [
    'modelClass' => 'Attributes Groups',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('attributes_groups', 'Attributes Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('attributes_groups', 'Update');
?>
<div class="attributes-groups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
