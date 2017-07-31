<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\products\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_products')->textInput() ?>

    <?= $form->field($model, 'products_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_products_measure_unit')->textInput() ?>

    <?= $form->field($model, 'id_products_brand')->textInput() ?>

    <?= $form->field($model, 'id_product_service')->textInput() ?>

    <?= $form->field($model, 'id_products_category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_produdcts_status')->textInput() ?>

    <?= $form->field($model, 'retest')->textInput() ?>

    <?= $form->field($model, 'hydrotest')->textInput() ?>

    <?= $form->field($model, 'products_capacity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_products_chemical')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
