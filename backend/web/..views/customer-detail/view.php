<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerDetail */

$this->title = $model->id_customer_detail;
$this->params['breadcrumbs'][] = ['label' => 'Customer Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_customer_detail], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_customer_detail], [
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
            'id_customer_detail',
            'id_customer',
            'id_customer_branch',
            'id_customer_detail_type',
            'customer_detail_value',
        ],
    ]) ?>

</div>
