<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerProducts */

$this->title = 'Update Customer Products: ' . $model->id_customer_product;
$this->params['breadcrumbs'][] = ['label' => 'Customer Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_customer_product, 'url' => ['view', 'id' => $model->id_customer_product]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
