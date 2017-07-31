<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerProducts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_customer_product')->textInput() ?>

    <?= $form->field($model, 'id_customer')->textInput() ?>

    <?= $form->field($model, 'id_products')->textInput() ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_products_status')->textInput() ?>

    <?= $form->field($model, 'last_t_date')->textInput() ?>

    <?= $form->field($model, 'retest')->textInput() ?>

    <?= $form->field($model, 'hydrotest')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
