<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesStatus */

$this->title = $model->id_contract_services_status;
$this->params['breadcrumbs'][] = ['label' => 'Contract Services Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-services-status-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_contract_services_status], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_contract_services_status], [
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
            'id_contract_services_status',
            'contract_services_status',
        ],
    ]) ?>

</div>
