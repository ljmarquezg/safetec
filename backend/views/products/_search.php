<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_products') ?>

    <?= $form->field($model, 'products_description') ?>

    <?= $form->field($model, 'id_products_measure_unit') ?>

    <?= $form->field($model, 'id_products_brand') ?>

    <?= $form->field($model, 'id_product_service') ?>

    <?php // echo $form->field($model, 'id_products_category') ?>

    <?php // echo $form->field($model, 'id_produdcts_status') ?>

    <?php // echo $form->field($model, 'retest') ?>

    <?php // echo $form->field($model, 'hydrotest') ?>

    <?php // echo $form->field($model, 'products_capacity') ?>

    <?php // echo $form->field($model, 'id_products_chemical') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
