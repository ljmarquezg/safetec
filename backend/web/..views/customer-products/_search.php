<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_customer_product') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'id_customer_branch') ?>

    <?= $form->field($model, 'id_products') ?>

    <?= $form->field($model, 'serial_number') ?>

    <?php // echo $form->field($model, 'id_products_status') ?>

    <?php // echo $form->field($model, 'last_t_date') ?>

    <?php // echo $form->field($model, 'retest') ?>

    <?php // echo $form->field($model, 'hydrotest') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
