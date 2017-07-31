<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerProducts */

$this->title = $model->id_customer_product;
$this->params['breadcrumbs'][] = ['label' => 'Customer Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_customer_product], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_customer_product], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_customer_product',
            'id_customer',
            'id_customer_branch',
            'id_products',
            'serial_number',
            'id_products_status',
            'last_t_date',
            'retest',
            'hydrotest',
        ],
    ]) ?>

</div>
