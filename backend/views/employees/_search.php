<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\employees\EmployeesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employees-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_employees') ?>

    <?= $form->field($model, 'employee_name') ?>

    <?= $form->field($model, 'employees_phone') ?>

    <?= $form->field($model, 'employees_email') ?>

    <?= $form->field($model, 'employees_vacation') ?>

    <?php // echo $form->field($model, 'employees_sick') ?>

    <?php // echo $form->field($model, 'employees_casual') ?>

    <?php // echo $form->field($model, 'employees_bereavement') ?>

    <?php // echo $form->field($model, 'employees_startdate') ?>

    <?php // echo $form->field($model, 'id_employees_department') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'employees_status') ?>

    <?php // echo $form->field($model, 'employees_created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
