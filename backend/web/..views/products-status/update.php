<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsStatus */

$this->title = 'Update Products Status: ' . $model->id_product_status;
$this->params['breadcrumbs'][] = ['label' => 'Products Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_product_status, 'url' => ['view', 'id' => $model->id_product_status]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
