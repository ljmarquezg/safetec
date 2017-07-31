<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\employees\Employees */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employees-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employee_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employees_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employees_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employees_vacation')->textInput() ?>

    <?= $form->field($model, 'employees_sick')->textInput() ?>

    <?= $form->field($model, 'employees_casual')->textInput() ?>

    <?= $form->field($model, 'employees_bereavement')->textInput() ?>

    <?= $form->field($model, 'employees_startdate')->textInput() ?>

    <?= $form->field($model, 'id_employees_department')->textInput() ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employees_status')->textInput() ?>

    <?= $form->field($model, 'employees_created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
