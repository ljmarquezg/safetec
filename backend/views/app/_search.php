<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\app\AppSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_app') ?>

    <?= $form->field($model, 'company_image') ?>

    <?= $form->field($model, 'user_image') ?>

    <?= $form->field($model, 'customer_image') ?>

    <?= $form->field($model, 'customer_branch_image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
