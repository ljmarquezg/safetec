<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\app\App */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_branch_image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
