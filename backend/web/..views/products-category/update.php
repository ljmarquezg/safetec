<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsCategory */

$this->title = 'Update Products Category: ' . $model->id_products_category;
$this->params['breadcrumbs'][] = ['label' => 'Products Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_products_category, 'url' => ['view', 'id' => $model->id_products_category]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
