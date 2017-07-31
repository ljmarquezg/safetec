<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'products_category_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_category_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
