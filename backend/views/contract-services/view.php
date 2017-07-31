<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServices */

$this->title = $model->id_contract_service;
$this->params['breadcrumbs'][] = ['label' => 'Contract Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-services-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_contract_service], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_contract_service], [
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
            'id_contract_service',
            'id_customer',
            'id_customer_branch',
            'id_contract',
            'id_contract_services_description',
            'contract_services_start',
            'contract_services_expire',
            'last_service',
            'next_service',
            'qty',
            'description',
            'cost',
            'id_contract_services_period',
            'total',
            'id_contract_services_status',
            'purchace_order',
        ],
    ]) ?>

</div>
