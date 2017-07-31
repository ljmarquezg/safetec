<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_status')->textInput() ?>

    <?= $form->field($model, 'status_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
