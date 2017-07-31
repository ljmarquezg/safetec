<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsChemical */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-chemical-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_products_chemical')->textInput() ?>

    <?= $form->field($model, 'products_chemical_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
