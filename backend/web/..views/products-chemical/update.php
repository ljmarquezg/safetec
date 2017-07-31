<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsChemical */

$this->title = 'Update Products Chemical: ' . $model->id_products_chemical;
$this->params['breadcrumbs'][] = ['label' => 'Products Chemicals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_products_chemical, 'url' => ['view', 'id' => $model->id_products_chemical]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-chemical-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
