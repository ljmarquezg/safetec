<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesStatus */

$this->title = 'Update Contract Services Status: ' . $model->id_contract_services_status;
$this->params['breadcrumbs'][] = ['label' => 'Contract Services Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contract_services_status, 'url' => ['view', 'id' => $model->id_contract_services_status]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contract-services-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
