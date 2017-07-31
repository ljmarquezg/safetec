<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\attendance\AttendanceType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attendance-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'attendance_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attendance_value')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
