<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\products\Products */

$this->title = 'Update Products: ' . $model->id_products;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_products, 'url' => ['view', 'id' => $model->id_products]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
