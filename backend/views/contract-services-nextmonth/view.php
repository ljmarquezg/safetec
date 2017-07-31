<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesNextmonth */

$this->title = $model->id_contract_services;
$this->params['breadcrumbs'][] = ['label' => 'Contract Services Nextmonths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-services-nextmonth-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_contract_services], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_contract_services], [
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
            'id_contract_services',
            'id_contract',
            'id_contract_services_description',
            'last_service',
            'next_service',
            'qty',
            'description',
            'cost',
            'id_contract_services_period',
            'total',
            'contract_services_status',
        ],
    ]) ?>

</div>
