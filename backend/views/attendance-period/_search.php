<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\attendance\AttendancePeriodSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attendance-period-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_attendance_period') ?>

    <?= $form->field($model, 'id_employees') ?>

    <?= $form->field($model, 'vacations') ?>

    <?= $form->field($model, 'sickLeave') ?>

    <?= $form->field($model, 'casual') ?>

    <?php // echo $form->field($model, 'breavement') ?>

    <?php // echo $form->field($model, 'start_period') ?>

    <?php // echo $form->field($model, 'end_period') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
