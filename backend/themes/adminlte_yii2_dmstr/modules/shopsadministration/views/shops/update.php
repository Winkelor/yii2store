<?php

use backend\components\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Shops */

$this->title = Yii::t('shops', 'Update {modelClass}: ', [
    'modelClass' => 'Shops',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('shops', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('shops', 'Update');
?>
<div class="shops-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
