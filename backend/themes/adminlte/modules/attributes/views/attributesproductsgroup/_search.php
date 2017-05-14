<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AttributesProductsGroupSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attributes-products-group-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'shop_id') ?>

    <?= $form->field($model, 'department_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'products_attributes_logistics_inf_id') ?>

    <?php // echo $form->field($model, 'attribute_product_id') ?>

    <?php // echo $form->field($model, 'attribute_category_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('attributes_products_group', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('attributes_products_group', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
