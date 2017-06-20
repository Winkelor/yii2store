<?php

use backend\components\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AttributesProducts */

$this->title = Yii::t('attributes_products', 'Create Attributes Products');
$this->params['breadcrumbs'][] = ['label' => Yii::t('attributes_products', 'Attributes Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attributes-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
