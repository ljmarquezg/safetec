<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_address2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_zip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_customer_status')->textInput() ?>

    <?= $form->field($model, 'customer_created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
