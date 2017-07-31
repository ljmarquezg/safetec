<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\Customer */

$this->title = $model->id_customer;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_customer], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_customer], [
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
            'id_customer',
            'customer_name',
            'customer_address',
            'customer_address2',
            'customer_contact',
            'customer_country',
            'customer_state',
            'customer_zip',
            'customer_zone',
            'customer_created',
            'customer_phone',
            'customer_fax',
            'customer_email:email',
            'id_customer_status',
            'image:ntext',
            'customer_status',
        ],
    ]) ?>

</div>
