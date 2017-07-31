<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_customer')->textInput() ?>

    <?= $form->field($model, 'id_customer_detail_type')->textInput() ?>

    <?= $form->field($model, 'customer_detail_value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
