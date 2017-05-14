<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AttributesProductsGroup */

$this->title = Yii::t('attributes_products_group', 'Create Attributes Products Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('attributes_products_group', 'Attributes Products Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attributes-products-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
