<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsMeasureunit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-measureunit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_product_measure_unit')->textInput() ?>

    <?= $form->field($model, 'product_measure_unit_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
