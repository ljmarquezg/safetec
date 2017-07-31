<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(['id'=>'createmodal-department']); ?>

    <!--?= $form->field($model, 'id_department')->textInput() ?-->

    <?= $form->field($modelDepartment, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group pull-right">
        <?= Html::submitButton($modelDepartment->isNewRecord ? 'Create' : 'Update', ['class' => $modelDepartment->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="form-group pull-right" style="margin-right: 20px;">
        <a href="#" class="btn btn btn-default closemodal hide">Close</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>

