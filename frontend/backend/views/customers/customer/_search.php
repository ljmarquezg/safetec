<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'customer_address') ?>

    <?= $form->field($model, 'customer_address2') ?>

    <?= $form->field($model, 'customer_country') ?>

    <?php // echo $form->field($model, 'customer_state') ?>

    <?php // echo $form->field($model, 'customer_zip') ?>

    <?php // echo $form->field($model, 'id_customer_status') ?>

    <?php // echo $form->field($model, 'customer_created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
