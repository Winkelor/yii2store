<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Shops $model
 */

$this->title = Yii::t('shops', 'Create {modelClass}', [
    'modelClass' => 'Shops',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('shops', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shops-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
