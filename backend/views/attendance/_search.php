<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\attendance\AttendanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attendance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_attendance') ?>

    <?= $form->field($model, 'id_eployees') ?>

    <?= $form->field($model, 'attendance_startdate') ?>

    <?= $form->field($model, 'attendance_enddate') ?>

    <?= $form->field($model, 'attendance_type') ?>

    <?php // echo $form->field($model, 'total_days') ?>

    <?php // echo $form->field($model, 'vacation') ?>

    <?php // echo $form->field($model, 'siickleave') ?>

    <?php // echo $form->field($model, 'casual') ?>

    <?php // echo $form->field($model, 'bereavement') ?>

    <?php // echo $form->field($model, 'nocontact') ?>

    <?php // echo $form->field($model, 'late') ?>

    <?php // echo $form->field($model, 'other') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
